<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Administration</title>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="<?= base_url() ?>public/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url() ?>public/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  
                  <span class="app-brand-text demo text-body fw-bolder">CAP-QCM</span>
                </a>
              </div>
              <!-- /Logo -->
              <?= form_open('Login/auth', array(
                'id' => "formAuthentication", 
                "class" => "mb-3"
                )) ;?>
               
                
                


                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input autofocus type="text" id='pseudo' class="form-control" name="pseudo" placeholder="Pseudo">
                <?php echo form_error('pseudo'); ?>
                  
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Mot de passe</label>
                  <div class="input-group input-group-merge">
                  <input type="password" aria-describedby="password" name="password" id='password' placeholder="Password" class='form-control'>
               
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    
                  </div>
                  <?php echo form_error('password'); ?>  
                </div>
                <input type="submit" value="Se connecter" class="btn btn-primary d-grid w-100">
                <?php if(isset($error)):?>
                    <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                    <?= $error ?>    
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                <?php endif ?>
                </form>

            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
    <script src="<?= base_url() ;?>public/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url() ;?>public/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url() ;?>public/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url() ;?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url() ;?>public/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url() ;?>public/assets/js/main.js"></script>

  </body>
</html>




