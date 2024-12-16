<main class="">
  <h1 class="title">Sign up</h1>

  <div class="columns">
    <div class="column is-half is-offset-one-quarter">

      <form action="" method="POST" class="">
        <div class="field">
          <label for="name" class="label">Name</label>
          <input
            id="name"
            name="name"
            class="input <?php echo isset($name) && !empty($name['errors']) ? ' is-danger' : '' ?>"
            type="text"
            placeholder="John Doe"
            value="<?php echo isset($name) ? $name['value'] : '' ?>">
          <?php if (isset($name) && !empty($name['errors'])): ?>
            <?php foreach ($name['errors'] as $error): ?>
              <p class="has-text-danger"><?php echo $error ?></p>
            <?php endforeach ?>
          <?php endif ?>
        </div>

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

        <div class="field">
          <label for="confirmPassword" class="label">Confirm Password</label>
          <input
            id="confirmPassword"
            name="confirmPassword"
            class="input <?php echo isset($confirmPassword) && !empty($confirmPassword['errors']) ? ' is-danger' : '' ?>"
            type="text"
            placeholder=""
            value="<?php echo isset($confirmPassword) ? $confirmPassword['value'] : '' ?>">
          <?php if (isset($confirmPassword) && !empty($confirmPassword['errors'])): ?>
            <?php foreach ($confirmPassword['errors'] as $error): ?>
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
          <p>If you already have an account..</p>
          <a href="/login" class="has-text-primary">
            Login
          </a>
        </div>
      </div>
    </div>
  </div>
</main>