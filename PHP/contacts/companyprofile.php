<?php
    session_start();
    include ("includes/header.php");
    $char_id = '';
    $char_id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM tgo_Contacts WHERE cid = '$char_id'") or die(mysqli_error($con));
    // loop thru results
    while ($row = mysqli_fetch_array($result)) {
        $fname = $row['tgo_fname'];
        $lname = $row['tgo_lname'];
        $email = $row['tgo_email'];
        $website = $row['tgo_website'];
        $phone = $row['tgo_phone'];
        $address = $row['tgo_address'];
        $city = $row['tgo_city'];
        $province = $row['tgo_province'];
        $description = $row['tgo_description'];
        $resume = $row['tgo_resume'];
        $company = $row['tgo_company'];

}
?>

<h2 style="text-decoration: underline; font-size: 50px;"><?php echo $company ?> </h2>
<div class="custom">
    <label class="NonGen" for="fname"> First Name: </label>
    <label name="fname" ><?php if ($fname) {echo $fname;} ?>  </label><br>
    
    <label class="NonGen" for="lname"> Last Name: </label>
    <label name="lname"> <?php if ($lname) {echo $lname;} ?>  </label><br>

    <label class="NonGen" for="email"> Email: </label>
    <a href="mailto:<?php echo $email; ?>"><?php if($email) {echo $email;}?></a><br>

    <label class="NonGen"> Website: </label>
    <a href="#" ><?php if($website) {echo $website;} ?> </a><br>

    <label class="NonGen" for="email"> Phone: </label>
    <label name="email"> <?php if ($phone) {echo $phone;} ?>  </label><br>

    <label class="NonGen" for="address"> Address: </label>
    <label name="address"> <?php if ($address) {echo $address;} ?>  </label><br>

    <label class="NonGen" for="city"> City: </label>
    <label name="city"> <?php if ($city) {echo $city;} ?>  </label><br>

    <label class="NonGen" for="prov"> Province: </label>
    <label name="prov"> <?php if ($province) {echo $province;} ?>  </label><br>

    <label class="NonGen" for="prov"> Description: </label>
    <label name="prov"> <?php if ($description) {echo $description;} ?>  </label><br>

    <label class="NonGen" for="resume"> Resume Sent? </label>
    <label name="resume"> <?php if ($resume == 1) {echo "Sent!";} else {echo 'Did not send!';}?>  </label><br>

</div>
<?php

include ("includes/footer.php");
?>