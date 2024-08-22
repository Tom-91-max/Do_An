<h3>Hi: {{ $account->name }}</h3>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos placeat repellat provident in deleniti repellendus, maxime eos ipsam voluptate. Nihil nemo doloribus porro. Et doloremque, delectus vero sit eaque laborum!
</p>

<p>
    <a href="{{ route('account.veryfy', $account->email) }}">Click here to verify your account</a>
</p>
