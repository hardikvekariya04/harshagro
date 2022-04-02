
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Agrocast
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.1/papaparse.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <!-- <div class="circle"></div> -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
      <img src="../assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="min-width: 8rem; min-height: 3rem; top: 0;">
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-primary" href="../indexD.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Climate</span>
          </a>
        </li>

        <li class="nav-item" style="border: 2px solid rgb(168, 168, 168); border-radius: 10%;">
          <a class="nav-link text-dark active bg-gradient-info" href="#">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">District</span>
          </a>
        </li>

        <li class="nav-item" >
          <a class="nav-link text-dark active bg-gradient-info" href="../indexD.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">Taluka</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark active bg-gradient-info" href="../pages/heatmap.html">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">circle</i>
            </div>
            <span class="nav-link-text ms-1">Heatmap</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark " href="../pages/crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Crops</span>
            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="../pages/taluka_crop.php">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Taluka Crops</span>
            
          </a>
        </li>
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
              
              <a class="btn bg-danger mt-0 w-100" href="" type="button" style="color: #fff;"><i class="material-icons opacity-10">login</i> Log Out</a>
      </div>
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-0 w-100" href="" type="button">Visit Home page</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Climate</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Districts</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
           

              
                <!-- <label>Select District:</label> -->
                <select id="district" >
                <!-- <option value="" >select</option> -->
                <option value="Ahmedabad" id="0">Ahmedabad</option>
                <option value="Anand" id="1">Anand</option>
                <option value="Banas Kantha" id="2">Banas kantha</option>
                <option value="Bharuch" id="3">Bharuch</option>
                <option value="Dahod" id="4">Dahod</option>
                <option value="Gandhinagar" id="5">Gandhinagar</option>
                <option value="Jamnagar" id="6">Jamnagar</option>
                <option value="Junagadh" id="7">Junagadh</option>
                <option value="Kachchh" id="8">Kachchh</option>
                <option value="Kheda" id="9">Kheda</option>
                <option value="Mahesana" id="10">Mahesana</option>
                <option value="Narmada" id="11">Narmada</option>
                <option value="Navsari" id="12">Navsari</option>
                <option value="Panch Mahals" id="13">Panch mahal</option>
                <option value="Patan" id="14">Patan</option>
                <option value="Porbandar" id="15">Porbandar</option>
                <option value="Rajkot" id="16">Rajkot</option>
                <option value="Sabar Kantha" id="17">Sabar kantha</option>
                <option value="Surat" id="18">Surat</option>
                <option value="Surendranagar" id="19">Surendranagar</option>
                <option value="Dang" id="20">Dang</option>
                <option value="Vadodara" id="21">Vadodara</option>
                <option value="Valsad" id="22">Valsad</option>
                <option value="Tapi" id="23">Tapi</option>
                <option value="Devbhumidwarka" id="24">Devbhumi Dwarka</option>
                <option value="Morbi" id="25">Morbi</option>
                <option value="Aravalli" id="26">Aravalli</option>
                <option value="Chhota Udepur" id="27">Chhota Udepur</option>
                <option value="Amreli" id="28">Amreli</option>
                <option value="Girsomnath" id="29">Girsomnath</option>
                <option value="Mahisagar" id="30">Mahisagar</option>
                <option value="Bhavnagar" id="31">Bhavnagar</option>
                <option value="Botad" id="32">Botad</option>

                
            </select>


              <select class="in" name="Taluka" id="taluka">
                
                <!-- <optgroup label="Ahmedabad" style="display: block;" > -->
                <option value="Ahmedabad" id="1">Ahmedabad</option>
                <option value="Ahmedabad" id="2">Bavla</option>
                <option value="Ahmedabad" id="3">Daskroi</option>
                <option value="Ahmedabad" id="4">Detroj-Rampura</option>
                <option value="Ahmedabad" id="5">Dhandhuka</option>
                <option value="Ahmedabad" id="6">Dholera</option>
                <option value="Ahmedabad" id="7">Dholka</option>
                <option value="Ahmedabad" id="8">Mandal</option>
                <option value="Ahmedabad" id="9">Sanand</option>
                <option value="Ahmedabad" id="10">Viramgam</option>
                <!-- </optgroup> -->
                <!-- <optgroup label="Anand" style="display: block;"> -->
                <option value="Anand" id="11">Anand</option>
                <option value="Anand" id="12">Anklav</option>
                <option value="Anand" id="13">Borsad</option>
                <option value="Anand" id="14">Khambhat</option>
                <option value="Anand" id="15">Petlad</option>
                <option value="Anand" id="16">Sojitra</option>
                <option value="Anand" id="17">Tarapur</option>
                <option value="Anand" id="18">Umreth</option>
                <!-- </optgroup> -->
                <!-- <optgroup label="Banas Kantha" style="display: block;"> -->
                <option value="Banas Kantha" id="19">Amirgadh</option>
                <option value="Banas Kantha" id="20">Bhabhar</option>
                <option value="Banas Kantha" id="21">Danta</option>
                <option value="Banas Kantha" id="22">Dantiwada</option>
                <option value="Banas Kantha" id="23">Deesa</option>
                <option value="Banas Kantha" id="24">Deodar</option>
                <option value="Banas Kantha" id="25">Dhanera</option>
                <option value="Banas Kantha" id="26">Kankrej</option>
                <option value="Banas Kantha" id="27">Lakhani</option>
                <option value="Banas Kantha" id="28">Palanpur</option>
                <option value="Banas Kantha" id="29">Suigam</option>
                <option value="Banas Kantha" id="30">Tharad</option>
                <option value="Banas Kantha" id="31">Vadgam</option>
                <option value="Banas Kantha" id="32">Vav</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Bharuch" style="display: block;"> -->
                <option value="Bharuch" id="33">Bharuch</option>
                <option value="Bharuch" id="34">Amod</option>
                <option value="Bharuch" id="35">Ankleshwar</option>
                <option value="Bharuch" id="36">Hansot</option>
                <option value="Bharuch" id="37">Jambusar</option>
                <option value="Bharuch" id="38">Jhagadia</option>
                <option value="Bharuch" id="39">Netrang</option>
                <option value="Bharuch" id="40">Vagra</option>
                <option value="Bharuch" id="41">Valia</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Dahod" style="display: block;"> -->
                <option value="Dahod" id="42">Dahod</option>
                <option value="Dahod" id="43">Devgadh Baria</option>
                <option value="Dahod" id="44">Dhanpur</option>
                <option value="Dahod" id="45">Fatepura</option>
                <option value="Dahod" id="46">Garbada</option>
                <option value="Dahod" id="47">Limkheda</option>
                <option value="Dahod" id="48">Sanjeli</option>
                <option value="Dahod" id="49">Jhalod</option>
                <option value="Dahod" id="50">Singvad</option>
                <!-- </optgroup> -->
                
                <!-- <optgroup label="Gandhinagar" style="display: block;"> -->
                <option value="Gandhinagar" id="51">Gandhinagar</option>
                <option value="Gandhinagar" id="52">Dehgam</option>
                <option value="Gandhinagar" id="53">Kalol</option>
                <option value="Gandhinagar" id="54">Mansa</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Jamnagar" style="display: block;"> -->
                <option value="Jamnagar" id="55">Jamnagar</option>
                <option value="Jamnagar" id="56">Dhrol</option>
                <option value="Jamnagar" id="57">Jamjodhpur</option>
                <option value="Jamnagar" id="58">Jodiya</option>
                <option value="Jamnagar" id="59">Kalavad</option>
                <option value="Jamnagar" id="60">Lalpur</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Junagadh" style="display: block;"> -->
                <option value="Junagadh" id="61">Junagadh</option>
                <option value="Junagadh" id="62">Bhesana</option>
                <option value="Junagadh" id="63">Junagadh Rural</option>
                <option value="Junagadh" id="64">Keshod</option>
                <option value="Junagadh" id="65">Malia</option>
                <option value="Junagadh" id="66">Manavadar</option>
                <option value="Junagadh" id="67">Mangrol</option>
                <option value="Junagadh" id="68">Mendarda</option>
                <option value="Junagadh" id="69">Vanthali</option>
                <option value="Junagadh" id="70">Visavadar</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Kachchh" style="display: block;"> -->
                <option value="Kachchh" id="71">Abdasa</option>
                <option value="Kachchh" id="72">Anjar</option>
                <option value="Kachchh" id="73">Bhachau</option>
                <option value="Kachchh" id="74">Bhuj</option>
                <option value="Kachchh" id="75">Gandhidham</option>
                <option value="Kachchh" id="76">Lakhpat</option>
                <option value="Kachchh" id="77">Mandvi</option>
                <option value="Kachchh" id="78">Mundra</option>
                <option value="Kachchh" id="79">Nakhatrana</option>
                <option value="Kachchh" id="80">Rapar</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Kheda" style="display: block;"> -->
                <option value="Kheda" id="81">Kheda</option>
                <option value="Kheda" id="82">Galteshwar</option>
                <option value="Kheda" id="83">Kapadvanj</option>
                <option value="Kheda" id="84">Kathlal</option>
                <option value="Kheda" id="85">Mahudha</option>
                <option value="Kheda" id="86">Matar</option>
                <option value="Kheda" id="87">Mehmedabad</option>
                <option value="Kheda" id="88">Nadiad</option>
                <option value="Kheda" id="89">Thasra</option>
                <option value="Kheda" id="90">Vaso</option>
                </optgroup>

                <!-- <optgroup label="Mahesana" style="display: block;"> -->
                <option value="Mahesana" id="91">Mahesana</option>
                <option value="Mahesana" id="92">Becharaji</option>
                <option value="Mahesana" id="93">Jotana</option>
                <option value="Mahesana" id="94">Kadi</option>
                <option value="Mahesana" id="95">Kheralu</option>
                <option value="Mahesana" id="96">Satlasana</option>
                <option value="Mahesana" id="97">Unjha</option>
                <option value="Mahesana" id="98">Vadnagar</option>
                <option value="Mahesana" id="99">Vijapur</option>
                <option value="Mahesana" id="100">Visnagar</option>
                <option value="Mahesana" id="101">Gojariya</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Narmada" style="display: block;"> -->
                <option value="Narmada" id="102">Dediapada</option>
                <option value="Narmada" id="103">Garudeshwar</option>
                <option value="Narmada" id="104">Nandod</option>
                <option value="Narmada" id="105">Sagbara</option>
                <option value="Narmada" id="106">Tilakwada</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Navsari" style="display: block;"> -->
                <option value="Navsari" id="107">Navsari</option>
                <option value="Navsari" id="108">Vansda</option>
                <option value="Navsari" id="109">Chikhli</option>
                <option value="Navsari" id="110">Gandevi</option>
                <option value="Navsari" id="111">Jalapore</option>
                <option value="Navsari" id="112">Khergam</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Panch Mahals" style="display: block;"> -->
                <option value="Panch Mahals" id="113">Ghoghamba</option>
                <option value="Panch Mahals" id="114">Godhra</option>
                <option value="Panch Mahals" id="115">Halol</option>
                <option value="Panch Mahals" id="116">Jambughoda</option>
                <option value="Panch Mahals" id="117">Kalol</option>
                <option value="Panch Mahals" id="118">Morwa Hadaf</option>
                <option value="Panch Mahals" id="119">Shehera</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Patan" style="display: block;"> -->
                <option value="Patan" id="120">Patan</option>
                <option value="Patan" id="121">Chanasma</option>
                <option value="Patan" id="122">Harij</option>
                <option value="Patan" id="123">Radhanpur</option>
                <option value="Patan" id="124">Sami</option>
                <option value="Patan" id="125">Sankheswar</option>
                <option value="Patan" id="126">Santalpur</option>
                <option value="Patan" id="127">Sarasvati</option>
                <option value="Patan" id="128">Sidhpur</option>
                  <!-- </optgroup> -->

                <!-- <optgroup label="Porbandar" style="display: block;"> -->
                <option value="Porbandar" id="129">Porbandar</option>
                <option value="Porbandar" id="130">Kutiyana</option>
                <option value="Porbandar" id="131">Ranavav</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Rajkot" style="display: block;"> -->
                <option value="Rajkot" id="132">Rajkot</option>
                <option value="Rajkot" id="133">Dhoraji</option>
                <option value="Rajkot" id="134">Gondal</option>
                <option value="Rajkot" id="135">Jamkandorna</option>
                <option value="Rajkot" id="136">Jasdan</option>
                <option value="Rajkot" id="137">Jetpur</option>
                <option value="Rajkot" id="138">Kotada Sangani</option>
                <option value="Rajkot" id="139">Lodhika</option>
                <option value="Rajkot" id="140">Paddhari</option>
                <option value="Rajkot" id="141">Upleta</option>
                <option value="Rajkot" id="142">Vinchchiya</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Sabar Kantha" style="display: block;"> -->
                <option value="Sabar Kantha" id="143">Himatnagar</option>
                <option value="Sabar Kantha" id="144">Idar</option>
                <option value="Sabar Kantha" id="145">Khedbrahma</option>
                <option value="Sabar Kantha" id="146">Poshina</option>
                <option value="Sabar Kantha" id="147">Prantij</option>
                <option value="Sabar Kantha" id="148">Talod</option>
                <option value="Sabar Kantha" id="149">Vadali</option>
                <option value="Sabar Kantha" id="150">Vijaynagar</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Surat" style="display: block;"> -->
                <option value="Surat" id="151">Surat</option>
                <option value="Surat" id="152">Bardoli</option>
                <option value="Surat" id="153">Choryasi</option>
                <option value="Surat" id="154">Kamrej</option>
                <option value="Surat" id="155">Mahuva</option>
                <option value="Surat" id="156">Mandvi</option>
                <option value="Surat" id="157">Mangrol</option>
                <option value="Surat" id="158">Olpad</option>
                <option value="Surat" id="159">Palsana</option>
                <option value="Surat" id="160">Umarpada</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Surendranagar" style="display: block;"> -->
                <option value="Surendranagar" id="161">Chotila</option>
                <option value="Surendranagar" id="162">Chuda</option>
                <option value="Surendranagar" id="163">Dasada</option>
                <option value="Surendranagar" id="164">Dhrangadhra</option>
                <option value="Surendranagar" id="165">Lakhtar</option>
                <option value="Surendranagar" id="166">Limbdi</option>
                <option value="Surendranagar" id="167">Muli</option>
                <option value="Surendranagar" id="168">Sayla</option>
                <option value="Surendranagar" id="169">Thangadh</option>
                <option value="Surendranagar" id="170">Wadhwan</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Dang" style="display: block;"> -->
                <option value="Dang" id="171">Ahwa</option>
                <option value="Dang" id="172">Subir</option>
                <option value="Dang" id="173">Waghai</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Vadodara" style="display: block;"> -->
                <option value="Vadodara" id="174">Vadodara</option>
                <option value="Vadodara" id="175">Dabhoi</option>
                <option value="Vadodara" id="176">Desar</option>
                <option value="Vadodara" id="177">Karjan</option>
                <option value="Vadodara" id="178">Padra</option>
                <option value="Vadodara" id="179">Savli</option>
                <option value="Vadodara" id="180">Sinor</option>
                <option value="Vadodara" id="181">Vaghodia</option>
              <!-- </optgroup> -->
              
              
              <!-- <optgroup label="Valsad" style="display: block;"> -->
                <option value="Valsad" id="182">Valsad</option>
                <option value="Valsad" id="183">Dharampur</option>
                <option value="Valsad" id="184">Kaprada</option>
                <option value="Valsad" id="185">Pardi</option>
                <option value="Valsad" id="186">Umbergaon</option>
                <option value="Valsad" id="187">Vapi</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Tapi" style="display: block;"> -->
                <option value="Tapi" id="188">Nizar</option>
                <option value="Tapi" id="189">Songadh</option>
                <option value="Tapi" id="190">Uchhal</option>
                <option value="Tapi" id="191">Valod</option>
                <option value="Tapi" id="192">Vyara</option>
                <option value="Tapi" id="193">Kukarmunda</option>
                <option value="Tapi" id="194">Dolvan</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Devbhumidwarka" style="display: block;"> -->
                <option value="Devbhumidwarka" id="195">Bhanvad</option>
                <option value="Devbhumidwarka" id="196">Kalyanpur</option>
                <option value="Devbhumidwarka" id="197">Khambhalia</option>
                <option value="Devbhumidwarka" id="199">Okhamandal</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Morbi" style="display: block;"> -->
                <option value="Morbi" id="200">Halvad</option>
                <option value="Morbi" id="201">Maliya</option>
                <option value="Morbi" id="202">Morbi</option>
                <option value="Morbi" id="203">Tankara</option>
                <option value="Morbi" id="204">Wankaner</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Aravalli" style="display: block;"> -->
                <option value="Aravalli" id="205">Bayad</option>
                <option value="Aravalli" id="206">Bhiloda</option>
                <option value="Aravalli" id="207">Dhansura</option>
                <option value="Aravalli" id="208">Malpur</option>
                <option value="Aravalli" id="209">Meghraj</option>
                <option value="Aravalli" id="210">Modasa</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Chhota Udepur" style="display: block;"> -->
                <option value="Chhota Udepur" id="211">Chhota Udepur</option>
                <option value="Chhota Udepur" id="212">Bodeli</option>
                <option value="Chhota Udepur" id="213">Jetpur Pavi</option>
                <option value="Chhota Udepur" id="214">Kavant</option>
                <option value="Chhota Udepur" id="215">Nasvadi</option>
                <option value="Chhota Udepur" id="216">Sankheda</option>
                  <!-- </optgroup> -->


                <!-- <optgroup label="Amreli" style="display: block;"> -->
                <option value="Amreli" id="217">Amreli</option>
                <option value="Amreli" id="218">Babra</option>
                <option value="Amreli" id="219">Bagasara</option>
                <option value="Amreli" id="220">Dhari</option>
                <option value="Amreli" id="221">Jafrabad</option>
                <option value="Amreli" id="222">Khambha</option>
                <option value="Amreli" id="223">Kunkavav Vadia</option>
                <option value="Amreli" id="224">Lathi</option>
                <option value="Amreli" id="225">Lilia</option>
                <option value="Amreli" id="226">Rajula</option>
                <option value="Amreli" id="227">Savarkundla</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Girsomnath" style="display: block;"> -->
                <option value="Girsomnath" id="228">Gir Gadhada</option>
                <option value="Girsomnath" id="229">Kodinar</option>
                <option value="Girsomnath" id="230">Sutrapada</option>
                <option value="Girsomnath" id="231">Talala</option>
                <option value="Girsomnath" id="232">Una</option>
                <option value="Girsomnath" id="233">Patan Veraval</option>
                <!-- </optgroup> -->


                <!-- <optgroup label="Mahisagar" style="display: block;"> -->
                <option value="Mahisagar" id="234">Balasinor</option>
                <option value="Mahisagar" id="235">Kadana</option>
                <option value="Mahisagar" id="236">Khanpur</option>
                <option value="Mahisagar" id="237">Lunawada</option>
                <option value="Mahisagar" id="238">Santrampur</option>
                <option value="Mahisagar" id="239">Virpur</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Bhavnagar" style="display: block;"> -->
                <option value="Bhavnagar" id="240">Bhavnagar</option>
                <option value="Bhavnagar" id="241">Gariadhar</option>
                <option value="Bhavnagar" id="242">Ghogha</option>
                <option value="Bhavnagar" id="243">Jesar</option>
                <option value="Bhavnagar" id="244">Mahuva</option>
                <option value="Bhavnagar" id="245">Palitana</option>
                <option value="Bhavnagar" id="246">Sihor</option>
                <option value="Bhavnagar" id="247">Talaja</option>
                <option value="Bhavnagar" id="248">Umrala</option>
                <option value="Bhavnagar" id="249">Vallabhipur</option>
                <!-- </optgroup> -->

                <!-- <optgroup label="Botad" style="display: block;"> -->
                <option value="Botad" id="250">Botad</option>
                <option value="Botad" id="251">Barwala</option>
                <option value="Botad" id="252">Gadhada</option>
                <option value="Botad" id="253">Ranpur</option>
                <!-- </optgroup> -->
               
              </select>
              <select class="in" name="weeks" id="weeks">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11" selected>11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40">40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="49">49</option>
                <option value="50">50</option>
                <option value="51">51</option>
                <option value="52">52</option>
                
              </select>

              <select class="in" name="type" id="type">
              <option value="NDVI">NDVI</option>
                <option value="SMT">SMT</option>
                <option value="TCI">TCI</option>
                <option value="VCI">VCI</option>
                <option value="VHI">VHI</option>
              </select>

              <select class="in" name="period" id="per">
              <option value="">Select period </option>
                <option value="last 6 month">last 6 month</option>
                <option value="last 3 year">last 52 weeks</option>
              </select>

              <!-- <input class="in" id="date" type="date" placeholder="DD-MM-YYYY" min="1997-01-01" max="2020-02-15" value="2020-05-30" selected> -->
              <select class="in" name="years" id="years">
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984" selected>1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>

              </select>
            </div>
          </div>
          <!-- <input class="in" id="date" type="date" placeholder="YYYY" min="1997" max="2023" value="2020"> -->

          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      
 
    <div class="row mt-0" style="margin-bottom:-80px">
      <div class="col-lg-0 col-md-6 mt-0 mb-4">
          <!-- <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent"> -->
              
                <div class="mapcontainer" id="map1">
    
    
                    <div id="map"></div>
              </div>  
              
            <!-- </div> -->
            <!-- <div class="card-body">
              <h6 class="mb-0 ">District Level Data</h6>
              <p class="text-sm ">Gujrat, India</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated few mins ago </p>
              </div>-->
            <!-- </div>  -->
          </div>
      
        <div class="col-lg-6 col-md-6 mb-4" style="width:570px;margin-top:-20px;">
          <!-- <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent"> -->
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart" id="chart_data" style="width:550px;">
                  <canvas id="chart-line" class="chart-canvas" height="270" width="300"></canvas>
              </div>
              <hr style="margin-top:-5px">
                <div class="chart" id="chart_data1">
                  <canvas id="chart-bars" class="chart-canvas" height="280" width="300"></canvas>
                </div>
                <!-- <div class="chart">
                  <canvas id="chart-bars1" class="chart-canvas" height="300" width="300"></canvas>
                </div> -->
                
            </div>
            <!-- </div> -->
            <!-- <div class="card-body">
              <h6 class="mb-0 "> Last Year Data </h6>
              <p class="text-sm "> Gujrat, Ahemdabad </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated few mins ago </p>
              </div>
            </div> -->
          <!-- </div>
        </div>-->
         


      

      
      </div>
</div>
      
<footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-5 mb-lg-0 mb-0">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                by
                <a class="font-weight-bold" target="_blank">Agrocast</a>
                </div>
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
               
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#content4-28" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#team1-1g" class="nav-link text-muted" target="_blank">Team</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/index.html#form1-c" class="nav-link pe-0 text-muted" target="_blank">Get in Touch</a>
                </li>
              </ul>
              
            </div>
            <div class="col-lg-6">
              <!-- <ul class="nav nav-footer justify-content-center justify-content-lg-end">
               
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#content4-28" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/#team1-1g" class="nav-link text-muted" target="_blank">Team</a>
                </li>
                <li class="nav-item">
                  <a href="http://www.agrocastanalytics.com/index.html#form1-c" class="nav-link pe-0 text-muted" target="_blank">Get in Touch</a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/crop_taluka.js"></script>
  <script src="../map/crop_taluka_map.js"></script>
  <!-- <script src="../map/leaf.js" ></script> -->
    <!-- <script src="../map/districts1.js" ></script> -->

  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
    <!-- <script src="/assets/js/talukas.js"></script>
    <script src="/assets/js/leaf.js"></script> -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <!-- <script src="../map/districts.js" ></script> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  
  <script type="text/javascript">

  </script>

<?php
// last 7 days 
  $weeknumber = '35';
  $dto = new DateTime();
  $dto->setISODate(2013,$weeknumber);
  $ret = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret2 = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret3 = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret4 = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret5 = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret6 = $dto->format('Y-m-d');

  $dto->modify('-7 days');
  $ret7 = $dto->format('Y-m-d');

$date = new DateTime($ret2);
$weeknumber1 = $date->format("W");

$date2 = new DateTime($ret3);
$weeknumber2 = $date2->format("W");

$date3 = new DateTime($ret4);
$weeknumber3 = $date3->format("W");

$date4 = new DateTime($ret5);
$weeknumber4 = $date4->format("W");

$date5 = new DateTime($ret6);
$weeknumber5 = $date5->format("W");

$date6 = new DateTime($ret7);
$weeknumber6 = $date6->format("W");

        $con = new mysqli('localhost','root','','agro');
        $query1 =$con->query("SELECT SMT from crop where d_id = 1 AND week IN('$weeknumber','$weeknumber1','$weeknumber2','$weeknumber3','$weeknumber4','$weeknumber5','$weeknumber6') AND year  = '2013'" );
        while($row1 = $query1->fetch_assoc()){
          $month1[] = $row1['SMT'];
        }

$month_weeknumber = '38';
$month_dto = new DateTime();
$month_dto->setISODate(2013,$month_weeknumber);
$month_ret = $month_dto->format('Y-m-d');
echo $month_ret;
echo '<br>';

$month_dto->modify('-7 days');
$month_ret2 = $month_dto->format('Y-m-d');
echo $month_ret2;
echo '<br>';
$month_dto->modify('-7 days');
$month_ret3 = $month_dto->format('Y-m-d');
echo $month_ret3;
echo '<br>';
$month_dto->modify('-7 days');
$month_ret4 = $month_dto->format('Y-m-d');
echo $month_ret4;
echo '<br>';
$month_dto1 = new DateTime($month_ret2);
$month_weeknumber1 = $month_dto1->format("W");
echo $month_weeknumber1;
echo '<br>';

$month_dto2 = new DateTime($month_ret3);
$month_weeknumber2 = $month_dto2->format("W");
echo $month_weeknumber2;
echo '<br>';
$month_dto3 = new DateTime($month_ret4);
$month_weeknumber3 = $month_dto3->format("W");
echo $month_weeknumber3;
echo '<br>';

  $query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber','$month_weeknumber1','$month_weeknumber2','$month_weeknumber3') AND year = '2013'");
  while($row = $query->fetch_assoc()){
      $month[] = $row['SMT'];
      // $amount[] = $row['date'];
    }
$months1 =  json_encode($month);
echo $months1;
$first_month =  implode (",",$month);  
$month_temp1 = $first_month;//string
$temp_array1 = explode(',', $month_temp1);
$tot_temp1 = 0;
$temp_array_length1 = count($temp_array1);
foreach($temp_array1 as $temp1)
{
 $tot_temp1 += $temp1;
}
 $avg_high_temp1 = $tot_temp1/$temp_array_length1;


$month_dto->modify('-7 days');
$month_ret5 = $month_dto->format('Y-m-d');
// echo $month_ret5;

$month_dto->modify('-7 days');
$month_ret6 = $month_dto->format('Y-m-d');
// echo $month_ret6;
$month_dto->modify('-7 days');
$month_ret7 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret8 = $month_dto->format('Y-m-d');

$month_dto4 = new DateTime($month_ret5);
$month_weeknumber4 = $month_dto4->format("W");
// echo $month_weeknumber4;

$month_dto5 = new DateTime($month_ret6);
$month_weeknumber5 = $month_dto5->format("W");

$month_dto6 = new DateTime($month_ret7);
$month_weeknumber6 = $month_dto6->format("W");

$month_dto7 = new DateTime($month_ret8);
$month_weeknumber7 = $month_dto7->format("W");

$query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber4','$month_weeknumber5','$month_weeknumber6','$month_weeknumber7') AND year = '2013'");
  while($row = $query->fetch_assoc()){
      $month3[] = $row['SMT'];
      // $amount[] = $row['date'];
    }
    $months2 =  json_encode($month3);
    $second_month =  implode (",",$month3);  
  
  $month_temp2 = $second_month;
  $temp_array2 = explode(',', $month_temp2);
  $tot_temp2 = 0;
  $temp_array_length2 = count($temp_array2);
  foreach($temp_array2 as $temp2)
  {
   $tot_temp2 += $temp2;
  }
   $avg_high_temp2 = $tot_temp2/$temp_array_length2;


$month_dto->modify('-7 days');
$month_ret9 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret10 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret11 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret12 = $month_dto->format('Y-m-d');

$month_dto8 = new DateTime($month_ret9);
$month_weeknumber8 = $month_dto8->format("W");

$month_dto9 = new DateTime($month_ret10);
$month_weeknumber9 = $month_dto9->format("W");

$month_dto10 = new DateTime($month_ret11);
$month_weeknumber10 = $month_dto10->format("W");

$month_dto11 = new DateTime($month_ret12);
$month_weeknumber11 = $month_dto11->format("W");

$query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber8','$month_weeknumber9','$month_weeknumber10','$month_weeknumber11') AND year = '2013'");
  while($row = $query->fetch_assoc()){
      $month4[] = $row['SMT'];
    }

$months4 =  json_encode($month4);
  // echo '<br>';
  $third_month =  implode (",",$month4);  

$month_temp3 = $third_month;
$temp_array3 = explode(',', $month_temp3);
$tot_temp3 = 0;
$temp_array_length3 = count($temp_array3);
foreach($temp_array3 as $temp3)
{
 $tot_temp3 += $temp3;
}
 $avg_high_temp3 = $tot_temp3/$temp_array_length3;


$month_dto->modify('-7 days');
$month_ret13 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret14 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret15 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret16 = $month_dto->format('Y-m-d');

$month_dto12 = new DateTime($month_ret13);
$month_weeknumber12 = $month_dto12->format("W");

$month_dto13 = new DateTime($month_ret14);
$month_weeknumber13 = $month_dto13->format("W");

$month_dto14 = new DateTime($month_ret15);
$month_weeknumber14 = $month_dto14->format("W");

$month_dto16 = new DateTime($month_ret16);
$month_weeknumber15 = $month_dto16->format("W");

$query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber12','$month_weeknumber13','$month_weeknumber14','$month_weeknumber15') AND year = '2013'");
  while($row = $query->fetch_assoc()){
      $month5[] = $row['SMT'];
    }

    $months5 =  json_encode($month5);
  // echo '<br>';
  $four_month =  implode (",",$month5); 

$month_temp4 = $four_month;
$temp_array4 = explode(',', $month_temp4);
$tot_temp4 = 0;
$temp_array_length4 = count($temp_array4);
foreach($temp_array4 as $temp4)
{
 $tot_temp4 += $temp4;
}
 $avg_high_temp4 = $tot_temp4/$temp_array_length4;


$month_dto->modify('-7 days');
$month_ret17 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret18 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret19 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret20 = $month_dto->format('Y-m-d');

$month_dto17 = new DateTime($month_ret17);
$month_weeknumber16 = $month_dto17->format("W");

$month_dto18 = new DateTime($month_ret18);
$month_weeknumber17 = $month_dto18->format("W");

$month_dto19 = new DateTime($month_ret19);
$month_weeknumber18 = $month_dto19->format("W");

$month_dto20 = new DateTime($month_ret20);
$month_weeknumber19 = $month_dto20->format("W");

  $query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber16','$month_weeknumber17','$month_weeknumber18','$month_weeknumber19') AND year = '2013'");

  while($row = $query->fetch_assoc()){
      $month6[] = $row['SMT'];
    }
    $months6 =  json_encode($month6);
    // echo '<br>';
    $five_month =  implode (",",$month6); 
  $month_temp5 = $five_month;
  $temp_array5 = explode(',', $month_temp5);
  $tot_temp5 = 0;
  $temp_array_length5 = count($temp_array5);
  foreach($temp_array5 as $temp5)
  {
   $tot_temp5 += $temp5;
  }
   $avg_high_temp5 = $tot_temp5/$temp_array_length5;


$month_dto->modify('-7 days');
$month_ret21 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret22 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret23 = $month_dto->format('Y-m-d');

$month_dto->modify('-7 days');
$month_ret24 = $month_dto->format('Y-m-d');

$month_dto21 = new DateTime($month_ret21);
$month_weeknumber20 = $month_dto21->format("W");

$month_dto22 = new DateTime($month_ret22);
$month_weeknumber21 = $month_dto22->format("W");

$month_dto23 = new DateTime($month_ret23);
$month_weeknumber22 = $month_dto23->format("W");

$month_dto24 = new DateTime($month_ret24);
$month_weeknumber23 = $month_dto24->format("W");

$query =$con->query("SELECT SMT from crop where d_id = 2 AND week IN('$month_weeknumber20','$month_weeknumber21','$month_weeknumber22','$month_weeknumber23') AND year = '2013'");

  while($row = $query->fetch_assoc()){
      $month7[] = $row['SMT'];
    }

    $months7 =  json_encode($month7);
  // echo '<br>';
  $six_month =  implode (",",$month7); 
$month_temp6 =$six_month;
$temp_array6 = explode(',', $month_temp6);
$tot_temp6 = 0;
$temp_array_length6 = count($temp_array6);
foreach($temp_array6 as $temp6)
{
 $tot_temp6 += $temp6;
}
 $avg_high_temp6 = $tot_temp6/$temp_array_length6;
?>
<script>

// var ctx = document.getElementById("chart-bars").getContext("2d");
//     new Chart(ctx, {
//   type: "bar",
//   data: { 
//     labels: [],
//     datasets: [{
//       label: "Temperature",
//       tension: 0.4,
//       borderWidth: 0,
//       borderRadius: 4,
//       borderSkipped: false,
//       backgroundColor: "rgba(000, 000, 000, .8)",
//       data: [],
//       maxBarThickness: 6
//     }, ],
//   },

//   options: {
//     responsive: true,
//     maintainAspectRatio: false,
//     plugins: {
//       legend: {
//         display: true,
//       }
//     },
//     interaction: {
//       intersect: false,
//       mode: 'index',
//     },
//     scales: {
//       y: {
//         grid: {
//           drawBorder: false,
//           display: true,
//           drawOnChartArea: true,
//           drawTicks: false,
//           borderDash: [5, 5],
//           color: 'rgba(000, 000, 000, .2)'
//         },
//         ticks: {
//           suggestedMin: 0,
//           suggestedMax: 500,
//           beginAtZero: true,
//           padding: 10,
//           font: {
//             size: 14,
//             weight: 300,
//             family: "Roboto",
//             style: 'normal',
//             lineHeight: 2
//           },
//           color: "#fff"
//         },
//       },
//       x: {
//         grid: {
//           drawBorder: false,
//           display: true,
//           drawOnChartArea: true,
//           drawTicks: false,
//           borderDash: [5, 5],
//           color: 'rgba(000, 000, 000, .2)'
//         },
//         ticks: {
//           display: true,
//           color: '#000',
//           padding: 10,
//           font: {
//             size: 14,
//             weight: 300,
//             family: "Roboto",
//             style: 'normal',
//             lineHeight: 2
//           },
//         }
//       },
//     },
//   },
// });
var ctx = document.getElementById("chart-bars").getContext("2d");
new Chart(ctx, {
  type: "bar",
  data: { 
    // labels:<?php // echo json_encode($amount1) ?>,
    labels:['<?php echo json_encode($month_ret) ?>','<?php echo json_encode($month_ret5) ?>','<?php echo json_encode($month_ret9) ?>','<?php echo json_encode($month_ret13) ?>','<?php echo json_encode($month_ret17) ?>','<?php echo json_encode($month_ret21) ?>'],
    datasets: [{
      label: "Temperature",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 4,
      borderSkipped: false,
      backgroundColor: "rgba(000, 000, 000, .8)",
      //data: <?php //echo json_encode($month1) ?>,
      data : ['<?php echo json_encode($avg_high_temp1) ?>','<?php echo json_encode($avg_high_temp2) ?>','<?php echo json_encode($avg_high_temp3) ?>','<?php echo json_encode($avg_high_temp4) ?>','<?php echo json_encode($avg_high_temp5) ?>','<?php echo json_encode($avg_high_temp6) ?>'],
      maxBarThickness: 6
    }, ],
  },

  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: true,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(000, 000, 000, .2)'
        },
        ticks: {
          suggestedMin: 0,
          suggestedMax: 500,
          beginAtZero: true,
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
          color: "#000"
        },
      },
      x: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(000, 000, 000, .2)'
        },
        ticks: {
          display: true,
          color: '#000',
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
    // chart 2 (blue) 
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ['<?php echo json_encode($ret7)?>','<?php echo json_encode($ret6)?>','<?php echo json_encode($ret5)?>','<?php echo json_encode($ret4)?>','<?php echo json_encode($ret3)?>','<?php echo json_encode($ret2)?>','<?php echo json_encode($ret)?>'],
        datasets: [{
          label: "NDVI",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(000, 000, 000, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(000, 000, 000, .8)",
          borderColor: "rgba(000, 000, 000, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: <?php echo json_encode($month1)?>,
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(000, 000, 000, .2)'
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#000',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>