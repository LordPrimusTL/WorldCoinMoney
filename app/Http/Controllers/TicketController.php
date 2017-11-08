<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Helpers\Mailerr;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    //
    public function Index()
    {
        $tickets = Ticket::paginate(10);
        $categories = Category::all();
        $title = 'Tickets - admin';
        return view('Ticket.index', compact('tickets', 'categories','title'));
    }
    public function Create()
    {
        return view('Ticket.create')->with(['title' => 'Create Ticket',
            'cat'=>Category::all()]);
    }

    public function Store(Request $request, Mailerr $mailerr)
    {
        //dd($request->all());
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::id(),
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'message'   => $request->input('message'),
            'status'    => "Open",
        ]);

        if($ticket->save())
        {
            $mailerr->sendTicketInformation(Auth::user(), $ticket);
            $mailerr->notify("New Ticket Request");
            Session::flash('success',"A ticket with ID: #$ticket->ticket_id has been opened.");
            return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
        }
        else{
            Session::flash('error','An error occurred when trying to create the ticket, Please try again later');
        }

    }

    public function UserTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();
        $title = 'Tickets';
        return view('Ticket.user_ticket', compact('tickets', 'categories','title'));
    }

    public function show($t_id)
    {
        //dd(decrypt($t_id));
        $ticket = Ticket::where('ticket_id', decrypt($t_id))->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        $title = 'Show Ticket';
        return view('Ticket.show', compact('ticket', 'category', 'comments','title'));
    }

    public function close($ticket_id, Mailerr $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    public function PostComment(Request $request, Mailerr $mailerr)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id'   => Auth::id(),
            'comment'   => $request->input('comment'),
        ]);

        $t = Ticket::find($comment->ticket->id);
        $t->res = false;
        $t->save();
        //dd($comment);

        // send mail if the user commenting is not the ticket owner
        if ($comment->ticket->user->id !== Auth::user()->id) {
            $mailerr->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
        }

        Session::flash('success','Your Comment Has Been Submitted');
        return redirect()->back()->with("status", "Your comment has be submitted.");
    }

    public function CloseTicket($t_id)
    {
        $ticket = Ticket::where('ticket_id',decrypt($t_id))->firstOrFail();
        $ticket->status = 'Closed';
        $ticket->save();
        Session::flash('success','Ticket Closed Successfully');
        return redirect()->back();
    }
}
