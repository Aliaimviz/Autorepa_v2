 <div class="singup-form">
   <div class="container">
     <div class="row">
     <form id="registerForm" action="{{route('registerFormSubmit')}}">
       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
        <!--<select data-placeholder="Form Of Adress">
          <option>Form Of Adress</option>
          <option value="MR">Mr.</option>
          <option value="MRS">Mrs.</option>
          <option value="MISS">Miss.</option>
        </select> -->
       </div>
       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
          <b>Name:</b>        
         <input type="text" name="name" placeholder="First Name">
       </div>
       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
          <b>Address</b>
          <input type="text" name="address" class="form-control" value="" id="datetimepicker4" >
       </div>

       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
          <b>Postal</b>
          <input type="text" name="postal" class="form-control" value="" id="datetimepicker4" >
       </div>

       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
          <b>Phone</b>
          <input type="number" name="phone" class="form-control" value="" id="datetimepicker4" >
       </div>

       <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 float-left">
          <b>City</b> 
          <select id="city_id" name="city_id">
             @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->city_name}}</option>
             @endforeach
          </select> 
       </div>

      </div>

      <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
          <b>Email</b>        
          <input type="email" name="email" placeholder="Email Id">
       </div>
       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
         <select data-placeholder="Language...">
                  <option value="#">Language</option>
                  <option value="AF">Afrikanns</option>
                  <option value="SQ">Albanian</option>
                  <option value="AR">Arabic</option>
                  <option value="HY">Armenian</option>
                  <option value="EU">Basque</option>
                  <option value="BN">Bengali</option>
                  <option value="BG">Bulgarian</option>
                  <option value="CA">Catalan</option>
                  <option value="KM">Cambodian</option>
                  <option value="ZH">Chinese (Mandarin)</option>
                  <option value="HR">Croation</option>
                  <option value="CS">Czech</option>
                  <option value="DA">Danish</option>
                  <option value="NL">Dutch</option>
                  <option value="EN">English</option>
                  <option value="ET">Estonian</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finnish</option>
                  <option value="FR">French</option>
                  <option value="KA">Georgian</option>
                  <option value="DE">German</option>
                  <option value="EL">Greek</option>
                  <option value="GU">Gujarati</option>
                  <option value="HE">Hebrew</option>
                  <option value="HI">Hindi</option>
                  <option value="HU">Hungarian</option>
                  <option value="IS">Icelandic</option>
                  <option value="ID">Indonesian</option>
                  <option value="GA">Irish</option>
                  <option value="IT">Italian</option>
                  <option value="JA">Japanese</option>
                  <option value="JW">Javanese</option>
                  <option value="KO">Korean</option>
                  <option value="LA">Latin</option>
                  <option value="LV">Latvian</option>
                  <option value="LT">Lithuanian</option>
                  <option value="MK">Macedonian</option>
                  <option value="MS">Malay</option>
                  <option value="ML">Malayalam</option>
                  <option value="MT">Maltese</option>
                  <option value="MI">Maori</option>
                  <option value="MR">Marathi</option>
                  <option value="MN">Mongolian</option>
                  <option value="NE">Nepali</option>
                  <option value="NO">Norwegian</option>
                  <option value="FA">Persian</option>
                  <option value="PL">Polish</option>
                  <option value="PT">Portuguese</option>
                  <option value="PA">Punjabi</option>
                  <option value="QU">Quechua</option>
                  <option value="RO">Romanian</option>
                  <option value="RU">Russian</option>
                  <option value="SM">Samoan</option>
                  <option value="SR">Serbian</option>
                  <option value="SK">Slovak</option>
                  <option value="SL">Slovenian</option>
                  <option value="ES">Spanish</option>
                  <option value="SW">Swahili</option>
                  <option value="SV">Swedish </option>
                  <option value="TA">Tamil</option>
                  <option value="TT">Tatar</option>
                  <option value="TE">Telugu</option>
                  <option value="TH">Thai</option>
                  <option value="BO">Tibetan</option>
                  <option value="TO">Tonga</option>
                  <option value="TR">Turkish</option>
                  <option value="UK">Ukranian</option>
                  <option value="UR">Urdu</option>
                  <option value="UZ">Uzbek</option>
                  <option value="VI">Vietnamese</option>
                  <option value="CY">Welsh</option>
                  <option value="XH">Xhosa</option>
                </select>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
         <select name="userRole" id="userRole" data-placeholder="I Am...">
          <option value="1">I Am a Garage Owner</option>
          <option value="2">I Am a Customer</option>
       </div>
       <br>
      </div>

      <div class="row passbtn">
         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
           <input type="password" name="password" placeholder="Password">
         </div>
         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
           <input type="password" name="password2" placeholder="Conform Password">           
         </div>
         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 float-left">
           
           <input type="submit" name="submit" value="submit">
         </div>
      </div>
  </form>      
      <div class="row">
         <div class="invoice-btn invoice-btn-la">
           <button onclick="goBack()" > Back </button>        
      </div>

      </div>
   </div>
 </div>