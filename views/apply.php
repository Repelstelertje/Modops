<!-- Contact-->
<section class="page-section" id="apply">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-12 col-xl-12 text-center">
                <h2 class="mt-0"><?=$lang['APPLY-TITLE']?></h2>
                <hr class="divider" />
                <p class="text-muted mb-5"><?=$lang['APPLY-SUB-TITLE']?></p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-12">
                <form name="contactForm1" method="post" action="views/form.php" class="p-5 bg-white" onSubmit="gtag('event', 'submit', {'event_category': 'Application'});">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="fname"><?=$lang['FIRSTNAME']?></label>
                            <span class="error">* <?php echo $fnameErr;?></span>
                            <input type="text" id="fname" name="fname" class="form-control" value="<?=$fname?>" />
                        </div>  
                        <div class="col-md-6">
                            <label for="lname"><?=$lang['LASTNAME']?></label>
                            <span class="error">* <?php echo $lnameErr;?></span>
                            <input type="text" id="lname" name="lname" class="form-control" value="<?=$lname?>" />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="visitor_email"><?=$lang['EMAIL']?></label>
                            <span class="error">* <?php echo $visitor_emailErr;?></span>
                            <input type="email" id="visitor_email" name="visitor_email" class="form-control" value="<?=$visitor_email?>" />
                        </div>

                        <div class="col-md-6">
                            <label for="contact"><?=$lang['CONTACT']?></label>
                            <span class="error">* <?php echo $contactErr;?></span>
                            <input type="text" id="contact" name="contact" class="form-control" value="<?=$contact?>" />
                        </div>
                    </div>

                    <div class="row form-group">  
                        <div class="col-md-6">
                            <label for="country"><?=$lang['COUNTRY']?></label>
                            <span class="error">* <?php echo $countryErr;?></span>
                            <input type="text" id="country" name="country" class="form-control" value="<?=$country?>" />
                        </div>

                        <div class="col-md-3">
                            <label for="availability"><?=$lang['AVAILABILITY']?></label>
                            <select class="form-control" id="availability" name="availability" value="<?=$availability?>">
                                <option><?=$lang['DROPDOWN-SELECT']?></option>
                                <option value="Morning/afternoon"><?=$lang['AVAILABILITY-DROPDOWN-ONE']?></option>
                                <option value="Evening/night"><?=$lang['AVAILABILITY-DROPDOWN-TWO']?></option>
                                <option value="All parts of the day"><?=$lang['AVAILABILITY-DROPDOWN-THREE']?></option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="reference"><?=$lang['HOW-FINDER']?></label>
                            <select class="form-control" id="reference" name="reference" value="<?=$reference?>">
                                <option><?=$lang['DROPDOWN-SELECT']?></option>
                                <option value="Google"><?=$lang['HOW-FINDER-ONE']?></option>
                                <option value="Facebook"><?=$lang['HOW-FINDER-TWO']?></option>
                                <option value="Friends"><?=$lang['HOW-FINDER-THREE']?></option>
                                <option value="Other"><?=$lang['HOW-FINDER-FOUR']?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">    
                        <div class="col-md-6">
                            <label for="experience"><?=$lang['MAILCHAT-EXPERIENCE']?></label>
                            <input type="text" id="experience" name="experience" class="form-control" value="<?=$experience?>" />
                        </div>

                        <div class="col-md-6">
                            <label class="d-block"><?=$lang['WHICH-LANGUAGE']?></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="English" id="checkEnglish" name="language[]">
                                <label class="form-check-label" for="checkEnglish">
                                <?=$lang['ENGLISH']?>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="German" id="checkGerman" name="language[]">
                                <label class="form-check-label" for="checkGerman">
                                <?=$lang['GERMAN']?>
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Dutch" id="checkDutch" name="language[]">
                                <label class="form-check-label" for="checkDutch">
                                <?=$lang['DUTCH']?>
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="motivation"><?=$lang['MOTIVATION']?></label>
                            <span class="error">* <?php echo $motivationErr;?></span>
                            <textarea id="motivation" name="motivation" cols="30" rows="5" class="form-control"><?=$motivation?></textarea>
                        </div>
                    </div>
                    
                    <!-- Add reCAPTCHA widget -->
                    <div class="g-recaptcha" data-sitekey="6LcHHZYpAAAAAFFpjiuf5WHuR0rhuTujoex8D4dy"></div>
                    
                    <div class="row form-group">
                        <div class="text-center">
                            <input type="submit" value="<?=$lang['SUBMISSION']?>" class="btn btn-dark btn-xl">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>