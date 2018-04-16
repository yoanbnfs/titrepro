                <footer class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                    </div>                    
                </footer>
            </div>
        </div>    
        <?php 
        if ($_SERVER['PHP_SELF'] == '/index.php') { ?>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="assets/lib/bootstrap/dist/js/bootstrap.js"></script>
        <script src="assets/js/search.js"></script>
        <script src="assets/js/registration.js"></script>
        <script src="assets/js/main.js"></script>
        <?php } else { ?>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../assets/lib/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../assets/js/searchView.js"></script>
        <script src="../assets/js/registration.js"></script>
        <script src="../assets/js/account.js"></script>
        <script src="../assets/js/main.js"></script><?php } ?>
    </body>
</html>