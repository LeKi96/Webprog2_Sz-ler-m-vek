
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 style="margin: auto;  padding-bottom: 40px; text-align: center; margin-top:0; padding-top:  20px; margin-bottom:0;">
                Bejelentkezés</h2>
            <form action="<?= SITE_ROOT ?>beleptet" method="post">
                <div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto;  
                background-color: #333; color: antiquewhite; opacity: 0.9; padding: 5px; border-radius: 5px;">
                    <label for="login" class="form-label">Felhasználónév:</label>
                    <input type="text" name="login" id="login" class="form-control">
                    <br>
                    <label for="password" class="form-label">Jelszó:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <br>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Bejelentkezés">
                </div>
            </form>
        </div>
        
        <div class="col-md-6">
            <h2 style="margin: auto;  padding-bottom: 40px; text-align: center; margin-top:0; padding-top:  20px; margin-bottom:0;">
                Új felhasználó létrehozása</h2>
            <form action="<?= SITE_ROOT ?>regisztral" method="post">
                <div class="form-group" style="max-width: 400px; margin-left:auto; margin-right: auto;
                background-color: #333; color: antiquewhite; opacity: 0.9; padding: 5px; border-radius: 5px;">
                    <label for="csaladi_nev" class="form-label">Vezetéknév</label>
                    <input type="text" name="csaladi_nev" id="csaladi_nev" class="form-control" required
                           inputmode="text">
                    <br>
                    <label for="utonev" class="form-label">Keresztnév</label>
                    <input type="text" name="utonev" id="utonev" class="form-control" required inputmode="text">
                    <br>
                    <label for="reg_login" class="form-label">Felhasználónév</label>
                    <input type="text" name="reg_login" id="reg_login" class="form-control" >
                    <br>
                    <label for="reg_pw" class="form-label">Jelszó:</label>
                    <input type="password" name="reg_pw" id="reg_pw" class="form-control" >
                    <br>
                    <label for="reg_pw_confirm" class="form-label">Megerősítő jelszó:</label>
                    <input type="password" name="reg_pw_confirm" id="reg_pw_confirm" class="form-control"
                           aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text" style="font-size: small;">
                        Követelmények: legalább 8 karakter, legalább egy nagy-, egy kisbetű, ill. egy speciális karakter.
                    </div>
                    <br>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Felhasználó Létrehozása">
                </div>
            </form>
        </div>
    </div>
</div>

