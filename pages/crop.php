
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
          <a class="nav-link text-dark active bg-gradient-primary" href="../indexD.html">
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
          <a class="nav-link text-dark active bg-gradient-info" href="../indexD.html">
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
          <a class="nav-link text-dark " href="../pages/crop.html">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Crops</span>
            
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
                    <option value="Ahmadabad" id="0">Ahmadabad</option>
                    <option value="Anand" id="1">Anand</option>
                    <option value="Banaskantha" id="2">Banaskantha</option>
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
                    <option value="Panchmahal" id="13">Panchmahal</option>
                    <option value="Patan" id="14">Patan</option>
                    <option value="Porbandar" id="15">Porbandar</option>
                    <option value="Rajkot" id="16">Rajkot</option>
                    <option value="Sabarkantha" id="17">Sabarkantha</option>
                    <option value="Surat" id="18">Surat</option>
                    <option value="Surendrangar" id="19">Surendrangar</option>
                    <option value="Dang" id="20">Dang</option>
                    <option value="Vadodara" id="21">Vadodara</option>
                    <option value="Valsad" id="22">Valsad</option>
                    <option value="Tapi" id="23">Tapi</option>
                    <option value="Devbhumi Dwarka" id="24">Devbhumi Dwarka</option>
                    <option value="Morbi" id="25">Morbi</option>
                    <option value="Aravalli" id="26">Aravalli</option>
                    <option value="Chhota Udaipur" id="27">Chhota Udaipur</option>
                    <option value="Amreli" id="28">Amreli</option>
                    <option value="Girsomnath" id="29">Girsomnath</option>
                    <option value="Mahisagar" id="30">Mahisagar</option>
                    <option value="Bhavnagar" id="31">Bhavnagar</option>
                    <option value="Botad" id="32">Botad</option>
                    
                   
                    
                </select>

              <!-- <select class="in" name="Taluka" id="dis">
                <optgroup label="Gujrat">
                <optgroup label="Ahmedabad">
                <option value="1">Ahmedabad</option>
                <option value="2">Bavla</option>
                <option value="3">Daskroi</option>
                <option value="4">Detroj-Rampura</option>
                <option value="5">Dhandhuka</option>
                <option value="6">Dholera</option>
                <option value="7">Dholka</option>
                <option value="8">Mandal</option>
                <option value="9">Sanand</option>
                <option value="10">Viramgam</option>
                </optgroup>
                <optgroup label="Anand">
                <option value="11">Anand</option>
                <option value="12">Anklav</option>
                <option value="13">Borsad</option>
                <option value="14">Khambhat</option>
                <option value="15">Petlad</option>
                <option value="16">Sojitra</option>
                <option value="17">Tarapur</option>
                <option value="18">Umreth</option>
                </optgroup>
                <optgroup label="Banas Kantha">
                <option value="19">Amirgadh</option>
                <option value="20">Bhabhar</option>
                <option value="21">Danta</option>
                <option value="22">Dantiwada</option>
                <option value="23">Deesa</option>
                <option value="24">Deodar</option>
                <option value="25">Dhanera</option>
                <option value="26">Kankrej</option>
                <option value="27">Lakhani</option>
                <option value="28">Palanpur</option>
                <option value="29">Suigam</option>
                <option value="30">Tharad</option>
                <option value="31">Vadgam</option>
                <option value="32">Vav</option>
                </optgroup>

                <optgroup label="Bharuch">
                <option value="33">Bharuch</option>
                <option value="34">Amod</option>
                <option value="35">Ankleshwar</option>
                <option value="36">Hansot</option>
                <option value="37">Jambusar</option>
                <option value="38">Jhagadia</option>
                <option value="39">Netrang</option>
                <option value="40">Vagra</option>
                <option value="41">Valia</option>
                </optgroup>

                <optgroup label="Dahod">
                <option value="42">Dahod</option>
                <option value="43">Devgadh Baria</option>
                <option value="44">Dhanpur</option>
                <option value="45">Fatepura</option>
                <option value="46">Garbada</option>
                <option value="47">Limkheda</option>
                <option value="48">Sanjeli</option>
                <option value="49">Jhalod</option>
                <option value="50">Singvad</option>
                </optgroup>
                
                <optgroup label="Gandhinagar">
                <option value="51">Gandhinagar</option>
                <option value="52">Dehgam</option>
                <option value="53">Kalol</option>
                <option value="54">Mansa</option>
                </optgroup>

                <optgroup label="Jamnagar">
                <option value="55">Jamnagar</option>
                <option value="56">Dhrol</option>
                <option value="57">Jamjodhpur</option>
                <option value="58">Jodiya</option>
                <option value="59">Kalavad</option>
                <option value="60">Lalpur</option>
                </optgroup>

                <optgroup label="Junagadh">
                <option value="61">Junagadh</option>
                <option value="62">Bhesana</option>
                <option value="63">Junagadh Rural</option>
                <option value="64">Keshod</option>
                <option value="65">Malia</option>
                <option value="66">Manavadar</option>
                <option value="67">Mangrol</option>
                <option value="68">Mendarda</option>
                <option value="69">Vanthali</option>
                <option value="70">Visavadar</option>
                </optgroup>

                <optgroup label="Kachchh">
                <option value="71">Abdasa</option>
                <option value="72">Anjar</option>
                <option value="73">Bhachau</option>
                <option value="74">Bhuj</option>
                <option value="75">Gandhidham</option>
                <option value="76">Lakhpat</option>
                <option value="77">Mandvi</option>
                <option value="78">Mundra</option>
                <option value="79">Nakhatrana</option>
                <option value="80">Rapar</option>
                </optgroup>

                <optgroup label="Kheda">
                <option value="81">Kheda</option>
                <option value="82">Galteshwar</option>
                <option value="83">Kapadvanj</option>
                <option value="84">Kathlal</option>
                <option value="85">Mahudha</option>
                <option value="86">Matar</option>
                <option value="87">Mehmedabad</option>
                <option value="88">Nadiad</option>
                <option value="89">Thasra</option>
                <option value="90">Vaso</option>
                </optgroup>

                <optgroup label="Mahesana">
                <option value="91">Mahesana</option>
                <option value="92">Becharaji</option>
                <option value="93">Jotana</option>
                <option value="94">Kadi</option>
                <option value="95">Kheralu</option>
                <option value="96">Satlasana</option>
                <option value="97">Unjha</option>
                <option value="98">Vadnagar</option>
                <option value="99">Vijapur</option>
                <option value="100">Visnagar</option>
                <option value="101">Gojariya</option>
                </optgroup>


                <optgroup label="Narmada">
                <option value="102">Dediapada</option>
                <option value="103">Garudeshwar</option>
                <option value="104">Nandod</option>
                <option value="105">Sagbara</option>
                <option value="106">Tilakwada</option>
                </optgroup>

                <optgroup label="Navsari">
                <option value="107">Navsari</option>
                <option value="108">Vansda</option>
                <option value="109">Chikhli</option>
                <option value="110">Gandevi</option>
                <option value="111">Jalapore</option>
                <option value="112">Khergam</option>
                </optgroup>


                <optgroup label="Panch Mahals">
                <option value="113">Ghoghamba</option>
                <option value="114">Godhra</option>
                <option value="115">Halol</option>
                <option value="116">Jambughoda</option>
                <option value="117">Kalol</option>
                <option value="118">Morwa Hadaf</option>
                <option value="119">Shehera</option>
                </optgroup>


                <optgroup label="Patan">
                <option value="120">Patan</option>
                <option value="121">Chanasma</option>
                <option value="122">Harij</option>
                <option value="123">Radhanpur</option>
                <option value="124">Sami</option>
                <option value="125">Sankheswar</option>
                <option value="126">Santalpur</option>
                <option value="127">Sarasvati</option>
                <option value="128">Sidhpur</option>
                  </optgroup>

                <optgroup label="Porbandar">
                <option value="129">Porbandar</option>
                <option value="130">Kutiyana</option>
                <option value="131">Ranavav</option>
                </optgroup>

                <optgroup label="Rajkot">
                <option value="132">Rajkot</option>
                <option value="133">Dhoraji</option>
                <option value="134">Gondal</option>
                <option value="135">Jamkandorna</option>
                <option value="136">Jasdan</option>
                <option value="137">Jetpur</option>
                <option value="138">Kotada Sangani</option>
                <option value="139">Lodhika</option>
                <option value="140">Paddhari</option>
                <option value="141">Upleta</option>
                <option value="142">Vinchchiya</option>
                </optgroup>

                <optgroup label="Sabar Kantha">
                <option value="143">Himatnagar</option>
                <option value="144">Idar</option>
                <option value="145">Khedbrahma</option>
                <option value="146">Poshina</option>
                <option value="147">Prantij</option>
                <option value="148">Talod</option>
                <option value="149">Vadali</option>
                <option value="150">Vijaynagar</option>
                </optgroup>

                <optgroup label="Surat">
                <option value="151">Surat</option>
                <option value="152">Bardoli</option>
                <option value="153">Choryasi</option>
                <option value="154">Kamrej</option>
                <option value="155">Mahuva</option>
                <option value="156">Mandvi</option>
                <option value="157">Mangrol</option>
                <option value="158">Olpad</option>
                <option value="159">Palsana</option>
                <option value="160">Umarpada</option>
                </optgroup>

                <optgroup label="Surendranagar">
                <option value="161">Chotila</option>
                <option value="162">Chuda</option>
                <option value="163">Dasada</option>
                <option value="164">Dhrangadhra</option>
                <option value="165">Lakhtar</option>
                <option value="166">Limbdi</option>
                <option value="167">Muli</option>
                <option value="168">Sayla</option>
                <option value="169">Thangadh</option>
                <option value="170">Wadhwan</option>
                </optgroup>

                <optgroup label="Dang">
                <option value="171">Ahwa</option>
                <option value="172">Subir</option>
                <option value="173">Waghai</option>
                </optgroup>

                <optgroup label="Vadodara">
                <option value="174">Vadodara</option>
                <option value="175">Dabhoi</option>
                <option value="176">Desar</option>
                <option value="177">Karjan</option>
                <option value="178">Padra</option>
                <option value="179">Savli</option>
                <option value="180">Sinor</option>
                <option value="181">Vaghodia</option>
              </optgroup>
              
              
              <optgroup label="Valsad">
                  <option value="182">Valsad</option>
                <option value="183">Dharampur</option>
                <option value="184">Kaprada</option>
                <option value="185">Pardi</option>
                <option value="186">Umbergaon</option>
                <option value="187">Vapi</option>
                </optgroup>

                <optgroup label="Tapi">
                <option value="188">Nizar</option>
                <option value="189">Songadh</option>
                <option value="190">Uchhal</option>
                <option value="191">Valod</option>
                <option value="192">Vyara</option>
                <option value="193">Kukarmunda</option>
                <option value="194">Dolvan</option>
                </optgroup>

                <optgroup label="Devbhumidwarka">
                <option value="195">Bhanvad</option>
                <option value="196">Kalyanpur</option>
                <option value="197">Khambhalia</option>
                <option value="198">Okhamandal</option>
                </optgroup>


                <optgroup label="Morbi">
                <option value="199">Halvad</option>
                <option value="200">Maliya</option>
                <option value="201">Morbi</option>
                <option value="202">Tankara</option>
                <option value="203">Wankaner</option>
                </optgroup>

                <optgroup label="Aravalli">
                <option value="204">Bayad</option>
                <option value="205">Bhiloda</option>
                <option value="206">Dhansura</option>
                <option value="207">Malpur</option>
                <option value="208">Meghraj</option>
                <option value="209">Modasa</option>
                </optgroup>


                <optgroup label="Chhota Udepur">
                <option value="210">Chhota Udepur</option>
                <option value="211">Bodeli</option>
                <option value="212">Jetpur Pavi</option>
                <option value="213">Kavant</option>
                <option value="214">Nasvadi</option>
                <option value="215">Sankheda</option>
                  </optgroup>


                <optgroup label="Amreli">
                <option value="216">Amreli</option>
                <option value="217">Babra</option>
                <option value="218">Bagasara</option>
                <option value="219">Dhari</option>
                <option value="220">Jafrabad</option>
                <option value="221">Khambha</option>
                <option value="222">Kunkavav Vadia</option>
                <option value="223">Lathi</option>
                <option value="224">Lilia</option>
                <option value="225">Rajula</option>
                <option value="226">Savarkundla</option>
                </optgroup>


                <optgroup label="Girsomnath">
                <option value="227">Gir Gadhada</option>
                <option value="228">Kodinar</option>
                <option value="229">Sutrapada</option>
                <option value="230">Talala</option>
                <option value="231">Una</option>
                <option value="232">Patan Veraval</option>
                </optgroup>


                <optgroup label="Mahisagar">
                <option value="233">Balasinor</option>
                <option value="234">Kadana</option>
                <option value="235">Khanpur</option>
                <option value="236">Lunawada</option>
                <option value="237">Santrampur</option>
                <option value="238">Virpur</option>
                </optgroup>

                <optgroup label="Bhavnagar">
                <option value="239">Bhavnagar</option>
                <option value="240">Gariadhar</option>
                <option value="241">Ghogha</option>
                <option value="242">Jesar</option>
                <option value="243">Mahuva</option>
                <option value="244">Palitana</option>
                <option value="245">Sihor</option>
                <option value="246">Talaja</option>
                <option value="247">Umrala</option>
                <option value="248">Vallabhipur</option>
                </optgroup>

                <optgroup label="Botad">
                <option value="249">Botad</option>
                <option value="250">Barwala</option>
                <option value="251">Gadhada</option>
                <option value="252">Ranpur</option>
                </optgroup>
                </optgroup>
              </select> -->
              <select class="in" name="weeks" id="weeks">
                <option value="0" default>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
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
                <option value="last 3 year">last 3 year</option>
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
  <script src="../assets/js/crop_district.js"></script>
  <script src="../map/crop_district_map.js"></script>
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

// last  6 month 
// $query_Date = '2018-09-30';
// $final_date = '2018-09-30';
// $monthly = date('Y-m-d', strtotime($final_date. ' - 1 month')); 
// $monthly1 = date('Y-m-d', strtotime($monthly. ' - 1 month')); 
// $monthly2 =date('Y-m-d', strtotime($monthly1. ' - 1 month')); 
// $monthly3 =date('Y-m-d', strtotime($monthly2. ' - 1 month')); 
// $monthly4 =date('Y-m-d', strtotime($monthly3. ' - 1 month')); 
// $monthly5 =date('Y-m-d', strtotime($monthly4. ' - 1 month')); 

// $one_monthly =date("Y - M",strtotime($monthly));
// $second_monthly =date("Y - M",strtotime($monthly1));
// $thrid_monthly =date("Y - M",strtotime($monthly2));
// $four_monthly =date("Y - M",strtotime($monthly3));
// $five_monthly =date("Y - M",strtotime($monthly4));
// $six_monthly =date("Y - M",strtotime($monthly5));


$month_weeknumber = '38';
$dto30 = new DateTime();
$dto30->setISODate(2013,$month_weeknumber);
$ret = $dto30->format('Y-m-d');
echo $ret;

$dto30->modify('-1 month');
$month_ret2 = $dto30->format('Y-m-d');
echo $month_ret2;

$date3 = new DateTime($month_ret2);
$month_weeknumber1 = $date3->format("W");
echo $month_weeknumber1;

  $query =$con->query("SELECT SMT from crop where d_id = 2 AND week BETWEEN '$month_weeknumber1' and '$month_weeknumber' && year = '2013'");
  while($row = $query->fetch_assoc()){
      $month[] = $row['SMT'];
      // $amount[] = $row['date'];
    }
  $months1 =  json_encode($month);
  echo $months1;
  // echo '<br>';
  $first_month =  implode (",",$month);  
  // echo $hardik;
$month_temp1 = $first_month;//string
$temp_array1 = explode(',', $month_temp1);
$tot_temp1 = 0;
$temp_array_length1 = count($temp_array1);
foreach($temp_array1 as $temp1)
{
 $tot_temp1 += $temp1;
}
 $avg_high_temp1 = $tot_temp1/$temp_array_length1;

//  echo "Average Temperature is : ".$avg_high_temp1.""; 


// $query3 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND  (date_sub('$monthly',Interval 1 month)) < date && date <= '$monthly'" );
//   while($row3 = $query3->fetch_assoc()){
//       $month3[] = $row3['max_temp'];
//       $amount3[] = $row3['date'];
//     }
//   $months2 =  json_encode($month3);
//   $second_month =  implode (",",$month3);  

// $month_temp2 = $second_month;
// $temp_array2 = explode(',', $month_temp2);
// $tot_temp2 = 0;
// $temp_array_length2 = count($temp_array2);
// foreach($temp_array2 as $temp2)
// {
//  $tot_temp2 += $temp2;
// }
//  $avg_high_temp2 = $tot_temp2/$temp_array_length2;
//  //echo "Average Temperature is : ".$avg_high_temp2."";



// $query4 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND (date_sub('$monthly1',Interval 1 month)) < date && date <= '$monthly1'" );
//   while($row4 = $query4->fetch_assoc()){
//       $month4[] = $row4['max_temp'];
//       $amount4[] = $row4['date'];
//     }
//   $months4 =  json_encode($month4);
//   // echo '<br>';
//   $third_month =  implode (",",$month4);  

// $month_temp3 = $third_month;
// $temp_array3 = explode(',', $month_temp3);
// $tot_temp3 = 0;
// $temp_array_length3 = count($temp_array3);
// foreach($temp_array3 as $temp3)
// {
//  $tot_temp3 += $temp3;
// }
//  $avg_high_temp3 = $tot_temp3/$temp_array_length3;
//  //echo "Average Temperature is : ".$avg_high_temp3."";


// $query5 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND (date_sub('$monthly2',Interval 1 month)) < date && date <= '$monthly2'" );
//   while($row5 = $query5->fetch_assoc()){
//       $month5[] = $row5['max_temp'];
//       $amount5[] = $row5['date'];
//     }
//   $months5 =  json_encode($month5);
//   // echo '<br>';
//   $four_month =  implode (",",$month5); 

// $month_temp4 = $four_month;
// $temp_array4 = explode(',', $month_temp4);
// $tot_temp4 = 0;
// $temp_array_length4 = count($temp_array4);
// foreach($temp_array4 as $temp4)
// {
//  $tot_temp4 += $temp4;
// }
//  $avg_high_temp4 = $tot_temp4/$temp_array_length4;
//  //echo "Average Temperature is : ".$avg_high_temp4."";


// $query6 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND (date_sub('$monthly3',Interval 1 month)) < date && date <= '$monthly3'" );
//   while($row6 = $query6->fetch_assoc()){
//       $month6[] = $row6['max_temp'];
//       $amount6[] = $row6['date'];
//     }
//   $months6 =  json_encode($month6);
//   // echo '<br>';
//   $five_month =  implode (",",$month6); 
// $month_temp5 = $five_month;
// $temp_array5 = explode(',', $month_temp5);
// $tot_temp5 = 0;
// $temp_array_length5 = count($temp_array5);
// foreach($temp_array5 as $temp5)
// {
//  $tot_temp5 += $temp5;
// }
//  $avg_high_temp5 = $tot_temp5/$temp_array_length5;
//  //echo "Average Temperature is : ".$avg_high_temp5."";


// $query7 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND (date_sub('$monthly4',Interval 1 month)) < date && date <= '$monthly4'" );
//   while($row7 = $query7->fetch_assoc()){
//       $month7[] = $row7['max_temp'];
//       $amount7[] = $row7['date'];
//     }
//   $months7 =  json_encode($month7);
//   // echo '<br>';
//   $six_month =  implode (",",$month7); 
// $month_temp6 =$six_month;
// $temp_array6 = explode(',', $month_temp6);
// $tot_temp6 = 0;
// $temp_array_length6 = count($temp_array6);
// foreach($temp_array6 as $temp6)
// {
//  $tot_temp6 += $temp6;
// }
//  $avg_high_temp6 = $tot_temp6/$temp_array_length6;
//  //echo "Average Temperature is : ".$avg_high_temp6."";


// $query8 =$con->query("SELECT max_temp,date from district_data where taluka_id = 2 AND (date_sub('$monthly5',Interval 1 month)) < date && date <= '$monthly5'" );
//   while($row8 = $query8->fetch_assoc()){
//       $month8[] = $row8['max_temp'];
//       $amount8[] = $row8['date'];
//     }
//   $months8 =  json_encode($month8);
//   // echo '<br>';
//   $seven_month =  implode (",",$month8); 
// $month_temp7 = $seven_month;
// $temp_array7 = explode(',', $month_temp7);
// $tot_temp7 = 0;
// $temp_array_length7 = count($temp_array7);
// foreach($temp_array7 as $temp7)
// {
//  $tot_temp7 += $temp7;
// }
//  $avg_high_temp7 = $tot_temp7/$temp_array_length7;
//  //echo "Average Temperature is : ".$avg_high_temp7."";



// // last 3 year
// $year_date_store = '2020-12-30';
// $yearly_one_date = date('Y-m-d', strtotime($year_date_store. ' - 1 year'));
// $yearly_second_date = date('Y-m-d', strtotime($yearly_one_date. ' - 1 year'));
// $query3 =$con->query("SELECT max_temp,date from district_data where taluka_id = 1 AND (date_sub('2020-12-30',Interval 1 year)) < date && date <= '2020-12-30'");
//   while($row3 = $query3->fetch_assoc()){
//       $year[] = $row3['max_temp'];
//       $year_date[] = $row3['date'];
//     }
//     $years1 =  json_encode($year);
//     // echo $years1;
//     $one_year =  implode (",",$year); 
// $year_temp = $one_year;
// $year_array = explode(',', $year_temp);
// $tot_year_temp = 0;
// $temp_array_year_length = count($year_array);
// foreach($year_array as $year_temp)
// {
//  $tot_year_temp += $year_temp;
// }
//  $avg_high_year_temp = $tot_year_temp/$temp_array_year_length;
// //  echo "<br>";
// //  echo $avg_high_year_temp;



// $query4 =$con->query("SELECT max_temp,date from district_data where taluka_id = 1 AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
//   while($row4 = $query4->fetch_assoc()){
//       $year1[] = $row4['max_temp'];
//       $year_date1[] = $row4['date'];
//     }
//     $years2 =  json_encode($year1);
//     // echo $years1;
//     $one_year1 =  implode (",",$year1); 
// $year_temp1 = $one_year1;
// $year_array1 = explode(',', $year_temp1);
// $tot_year_temp1 = 0;
// $temp_array_year_length1 = count($year_array1);
// foreach($year_array1 as $year_temp1)
// {
//  $tot_year_temp1 += $year_temp1;
// }
//  $avg_high_year_temp1 = $tot_year_temp1/$temp_array_year_length1;
// //  echo "<br>";
// //  echo $avg_high_year_temp1;


//  $query5 =$con->query("SELECT max_temp,date from district_data where taluka_id = 1 AND (date_sub('$yearly_one_date',Interval 1 year)) < date && date <= '$yearly_one_date'");
//  while($row5 = $query5->fetch_assoc()){
//      $year5[] = $row5['max_temp'];
//      $year_date5[] = $row5['date'];
//    }
//    $years5 =  json_encode($year5);
//    // echo $years1;
//    $one_year5 =  implode (",",$year5); 
// $year_temp5 = $one_year5;
// $year_array5 = explode(',', $year_temp5);
// $tot_year_temp5 = 0;
// $temp_array_year_length5 = count($year_array5);
// foreach($year_array5 as $year_temp5)
// {
// $tot_year_temp5 += $year_temp5;
// }
// $avg_high_year_temp5 = $tot_year_temp5/$temp_array_year_length5;
// echo "<br>";
// echo $avg_high_year_temp5;
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
    labels:['<?php echo json_encode($ret) ?>'],
    datasets: [{
      label: "Temperature",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 4,
      borderSkipped: false,
      backgroundColor: "rgba(000, 000, 000, .8)",
      //data: <?php //echo json_encode($month1) ?>,
      data : ['<?php echo json_encode($avg_high_temp1) ?>'],
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
          label: "Min Temp",
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