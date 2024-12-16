<main class="">
  <h1 class="title">Login</h1>

  <div class="columns">
    <div class="column is-half is-offset-one-quarter">
      <form action="" method="POST" class="">
        <div class="field">
          <label for="email" class="label">Email</label>
          <input
            id="email"
            name="email"
            class="input <?php echo isset($email) && !empty($email['errors']) ? ' is-danger' : '' ?>"
            type="email"
            placeholder="johndoe@mail.com"
            value="<?php echo isset($email) ? $email['value'] : '' ?>">
          <?php if (isset($email) && !empty($email['errors'])): ?>
            <?php foreach ($email['errors'] as $error): ?>
              <p class="has-text-danger"><?php echo $error ?></p>
            <?php endforeach ?>
          <?php endif ?>
        </div>
        <div class="field">
          <label for="password" class="label">Password</label>
          <input
            id="password"
            name="password"
            class="input <?php echo isset($password) && !empty($password['errors']) ? ' is-danger' : '' ?>"
            type="text"
            placeholder=""
            value="<?php echo isset($password) ? $password['value'] : '' ?>">
          <?php if (isset($password) && !empty($password['errors'])): ?>
            <?php foreach ($password['errors'] as $error): ?>
              <p class="has-text-danger"><?php echo $error ?></p>
            <?php endforeach ?>
          <?php endif ?>
        </div>
        <div class="control is-flex is-justify-content-end">
          <button type="submit" class="button is-primary is-dark">Submit</button>
        </div>
      </form>

      <div class="columns">
        <div class="column is-three-fifths is-offset-one-fifth is-flex is-flex-direction-column is-align-items-center is-gap-2">
          <p>If you don't have an account..</p>
          <a href="/signup" class="has-text-primary">
            Sign up
          </a>
        </div>
      </div>
    </div>
  </div>
</main>