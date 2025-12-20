<h1>View tin tuc</h1>
<?php echo $ds; ?>

<form action="/tin-tuc" method="POST">
    @csrf
    <input type="text" name="fullname" placeholder="Name">
    <button type="submit">Submit</button>
</form>

<form action="<?php echo route('user-get') ?>" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="fullname" placeholder="Name">
    <button type="submit">Get User Name from Session</button>
</form>
