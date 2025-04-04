<h1>Bienvenue {{ $user->first_name }} !</h1>

<p>Clique ici pour vérifier ton compte :</p>

<a href="http://localhost:5173/email-verification?email={{ $user->email }}&token={{ $user->token }}">
    Vérifier mon compte
</a>