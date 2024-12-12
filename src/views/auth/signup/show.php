<main class="">
  <h1 class="title">Sign up</h1>

  <div class="columns">
    <div class="column is-half is-offset-one-quarter">

      <form action="" method="POST" class="">
        <div class="field">
          <label for="name" class="label">Name</label>
          <input id="name" name="name" class="input" type="text" placeholder="johndoe@mail.com">
        </div>

        <div class="field">
          <label for="email" class="label">Email</label>
          <input id="email" name="email" class="input" type="email" placeholder="johndoe@mail.com">
        </div>

        <div class="field">
          <label for="password" class="label">Password</label>
          <input id="password" name="password" class="input" type="text" placeholder="">
        </div>

        <div class="control is-flex is-justify-content-end">
          <button type="submit" class="button is-primary is-dark">Submit</button>
        </div>
      </form>

      <div class="columns">
        <div class="column is-three-fifths is-offset-one-fifth is-flex is-flex-direction-column is-align-items-center is-gap-2">
          <p>If you already have an account..</p>
          <a href="/login" class="has-text-primary">
            Login
          </a>
        </div>
      </div>
    </div>
  </div>
</main>