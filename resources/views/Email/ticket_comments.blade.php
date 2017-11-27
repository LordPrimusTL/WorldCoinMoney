!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket:Crypto-Trading Matrix</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>

---
<p>Replied by: {{ $user->fullname }}</p>

<p>Title: {{ $ticket->title }}</p>
<p>Ticket ID: {{ $ticket->ticket_id }}</p>
<p>Status: {{ $ticket->status }}</p>

<p>
    You can view the ticket at any time at {{ route('user_ticket_show',['t_id' => encrypt($ticket->ticket_id)]) }}
</p>

</body>
</html>