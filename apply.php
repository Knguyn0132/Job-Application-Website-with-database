<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>SPOTIFREE | APPLY</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
        <!--NAV BAR-->
  <?php
  include_once "navbar.inc";
  ?>



    <!--Application-->
    <section class="appli-container">
        
        <form method="post" action="processEOI.php" novalidate = "novalidate">
            <div class="appli-content">
                <header>APPLICATION</header>
                <div class="column">
                    <div class="input-box">
                        <label for="firstname">First Name</label>
                        <input type="text" id="fname" name="firstname" maxlength="20" required pattern="[A-Za-z]+" title="Please enter a valid first name " placeholder="Enter First Name">
                    </div>

                    <div class="input-box">
                        <label for="lastname">Last Name
                            <input type="text" id="lname" name="lastname" maxlength="20" required pattern="^[A-Za-z]+" placeholder="Enter Last name"/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label for="prefername">Prefer Name(Optional)</label>
                        <input type="text" id="PN" name="prefername" pattern="^[A-Za-z]+" title="Please enter a preferred name " placeholder="Enter Preferred Name">
                    </div>
                </div>

                <fieldset>
                    <legend>Gender</legend>
                    <label for="male">Male</label>
                    <input type="radio" id="Male" class="sex" name="gender" value="male" required/>
                    
                    <label for="female">Female</label>
                    <input type="radio" id="Female" class="sex" name="gender" value="female" required/>
                    
                    <label for="preferNotToSay">Prefer Not to Say</label> 
                    <input type="radio" id="preferNotToSay" title="prefernottosay" class="sex" name="gender" value="preferNotToSay" required>
                   
                </fieldset>

                <div class="column">
                    <div class="input-box">
                        <label>Reference Number
                            <input type="text" name="referencenum" pattern = "(SE228|DE129|WD303)" title="Please enter one of the following codes: SE228, DE129, WD303" required="required" placeholder="Enter the Reference Number for the Job"/>
                        </label>
                    </div>
                    
                    <div class="input-box">
                        <label for="DOB">Date of birth
                            <input type="text" required="required" pattern="(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/\d{4}" placeholder="dd/mm/yyyy" name="dob" id="DOB"/>
                        </label>
                    </div>    
                </div>

                <div class="column">
                    <div class="input-box">
                        <label for="mail">Email Address
                            <input type="email" id="mail" name="contactemail" placeholder="name@domain.com" required/>
                    </label>
                    </div>

                    <div class="input-box">
                        <label for="pnum">Phone Number
                            <input type="tel" id="pnum" name="phonenum" required placeholder="Enter Phone Number" pattern="[0-9 ]{8,12}"/>
                    </label>
                    </div>
                </div>

                <div class="column">
                    <div class="input-box">
                        <label for="SA">Street Address
                            <input type="text" id="SA" name="streetaddress" maxlength="40" required pattern="^[a-zA-Z ]+$" placeholder="Enter the Street Address"/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label for="sub">Suburb
                            <input type="text" id="sub" name="suburb" maxlength="40" required pattern="^[A-Za-z]+" placeholder="Enter the Suburb"/>
                            </label>
                    </div>

                    <div class="input-box">
                        <label>Postal Code
                            <input type="text" name="postcode" required title="Please enter fours numbers only" pattern="\d{4}" placeholder="Enter your Postal Code"/>
                        </label>
                    </div>

                    <div class="input-box">
                        <label for="state">Select Your State</label>
                        <select name="state" required id="state">
                            <option value="" disabled selected>Select Your State</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </div>
                </div>
                <br>
                
                <div class="column">
                    <h4 id="title_skill">Skill List</h4>
                </div>    

                <div class="column">
                                    
                    <label for="htmlCheckbox" class="check_box">
                        <input type="checkbox" id="htmlCheckbox" value="HTML" name="skills[]" required>
                        HTML
                    </label>
                    <label for="CSS" class="check_box"><input id="CSS" type="checkbox" name="skills[]" value="CSS"/>
                            CSS3</label>
                    <label for="Java" class="check_box"><input id="Java" type="checkbox" name="skills[]" value="Java"/>
                             Javascript</label>
                    <label for="Redux" class="check_box"><input id="Redux" type="checkbox" name="skills[]" value="redux"/>
                            Redux</label>    
                    <label for="certificate" class="check_box"><input id="certificate" type="checkbox" name="skills[]" value="certificate"/>
                        Industry-recognized certifications</label>
                    <label for="2-5" class="check_box"><input id="2-5" type="checkbox" name="skills[]" value="2-5exp"/>
                            2 to 5 years in the field</label>
                    <label for="soft" class="check_box"><input id="soft" type="checkbox" name="skills[]" value="soft"/>
                            Soft Skill</label>  
                    <label for="research" class="check_box"><input id="research" type="checkbox" name="skills[]" value="research"/>
                            Research/Analysis</label> 
                    <label for="otherskill" class="check_box"><input id="otherskill" type="checkbox" name="skills[]" value="other"/>
                            Other Skills</label>
                </div>
                <br>
                <div class="column">
                    <label>Other Skills<br><textarea id="other_skill" name="other_skills" rows="7" cols="150" placeholder="Write more details" ></textarea>
                    </label>
                </div>
                
                <br>

                <div class="column">
                    <input class="appli_button" type="submit" value="Apply"/>
                    <input class="appli_button" type="reset" value="Reset"/><br/>
                </div>

            </div>
        </form>
    </section>














      <!--FOOTER-->
  <?php
    include_once "footer.inc";
  ?>
    

</body>
</html>