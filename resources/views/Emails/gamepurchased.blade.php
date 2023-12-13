<p>Hello {{ $user->name }},</p>

<br>
<br>

<p>Thank you for purchasing the game "{{ $game->game_title }}".</p>

<p>We hope you enjoy your new game!</p>

<p>Best regards,</p>
<p>The Game Store Team</p>

<br>
<br>

<i>If you didn't purchase any game or commit any transaction on our website, please visit our support page.</i>

<br>

<p>
    <a href="{{ url('/dashboard') }}" style="background-color: #1a202c; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-weight: bold; border-radius: 5px;">
      Proceed to Website
    </a>
  </p>
