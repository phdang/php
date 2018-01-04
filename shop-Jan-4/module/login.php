
                <h2 class="heading colr">Login</h2>
                <div class="login">
                	<div class="registrd">
                    	<form action="?mod=login_process" method="post" id="login">
                            <h3>Please Sign In</h3>
                            <p>If you have an account with us, please log in.</p>
                            <ul class="forms">
                                <li class="txt">Email Address <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="user" class="bar" value="<?= isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?>" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="pass" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li>
                                	<!--<a href="Javascript:document.getElementById('login').submit()" class="simplebtn"><span>Login</span></a>-->
                                    
                                    
                                    <button type="submit" style="border:none; cursor:pointer;"><a href="#" class="simplebtn"><span>Login</span></a></button>
                                    
                                	<a href="#" class="forgot">Forgot Your Password?</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="newcus">
                    	<h3>Please Sign In</h3>
                        <p>
                        	By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a href="?mod=register" class="simplebtn"><span>Register</span></a>
                    </div>
                </div>
                <div class="clear"></div>
         