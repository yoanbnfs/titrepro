<?php include 'views/header.php';
if (isset($_SESSION['auth'])){ ?>
<?php } else { ?>
<div class="row">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6">
        <div id="full-link-container" class="thumbnail text-center">
            <div id="about">
                <h2 id="about-title">Qui sommes nous ?</h2>
                <div id="about-details" class="thumbnail">
                    <p class="text-left">Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem
                       excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis
                       nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus 
                       temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento 
                       sputamine in oculos interrogantis Cyprii regis inpegit.
                    </p>
                </div>
            </div>
            <a id="full-link" name="registration-button" class="btn btn-info" data-toggle="modal" data-target="#registration"><i class="fas fa-lock"></i> Inscription</a>    
        </div>    
    </div>    
</div>
<?php } ?>
<?php include 'views/footer.php'; 
    
