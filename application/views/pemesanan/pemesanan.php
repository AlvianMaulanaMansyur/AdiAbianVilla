<!-- <div class="flex justify-center">
  <div class="w-full max-w-xs">

    <h1>Halaman pemesanan</h1>

    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="<?php echo base_url('pemesanan/createpemesanan') ?>" method="post">

      <div class="mb-4">
        <label class="block text-gray-700 text-md font-bold mb-2" for="username">
          Nama Lengkap
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Nama Lengkap">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-md font-bold mb-2" for="no_telp">
          Nomor Telepon
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="no_telp" type="number" name="no_telp" placeholder="Nomor Telepon">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-md font-bold mb-2" for="email">
          Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Email">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-md font-bold mb-2" for="negara">
          Negara
        </label>
        <div class="relative">
          <select id="negara" name="negara" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="">Pilih Negara</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
          </div>
        </div>
      </div>
      <label class="block text-gray-700 text-sm font-bold mb-2">
        Gender
      </label>
      <div class="flex mb-4 justify-between">
        <div class="flex items-center">
          <input id="laki-laki" type="radio" value="laki-laki" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
        </div>
        <div class="flex items-center">
          <input id="perempuan" type="radio" value="perempuan" name="jenis_kelamin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
        </div>
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Submit
      </button>
    </form>
  </div>
</div> -->

<!-- <?php var_dump($kamar) ?> -->
<!-- <?php var_dump($tamu) ?> -->

<?php   ?>
<div class="bg-gray-100 w-full" style="height: 1000px;">
  <div class="w-36 h-5 left-[381px] top-[80px] absolute text-black text-xl font-bold leading-7">Details</div>
  <div class="left-[381px] top-[138px] absolute h-1/2 bg-white shadow rounded" style="width: 812px;">

    <div class="left-[90px] top-[30px] absolute w-1/2 h-1/2">
      <div class="w-36 h-5 left-[0px] top-[0px] absolute text-black text-xl font-bold leading-7 z-10">Your Details</div>
      <form id="reservation-form" action="<?php echo base_url('pemesanan/createpemesanan') ?>" method="post">
        <!-- <div class="bg-white w-1/2 h-1/2 left-[290px] top-[130px] absolute bg-white shadow rounded"> -->
        <!-- </div> -->
        <fieldset disabled>
          <div class="w-72 h-20 left-[0px] top-[47px] absolute">
            <label for="username">Full Name</label>
            <input id="username" name="username" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: John Wick" value="<?php echo $tamu['nama'] ?>">
            <span class="error text-red-600" id="username-error"></span>
          </div>
          <div class="w-72 h-20 left-[394px] top-[47px] absolute">
            <label for="no_telp">Telephone Number</label>
            <input id="no_telp" name="no_telp" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: 085XXXXXXX" value="<?php echo $tamu['no_telp'] ?>">
            <span class="error text-red-600" id="no_telp-error"></span>
          </div>
          <div class="w-72 h-20 left-[0px] top-[135px] absolute">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: example@gmail.com" value="<?php echo $tamu['email'] ?>">
            <span class="error text-red-600" id="email-error"></span>
          </div>
          <div class="w-72 h-20 left-[394px] top-[135px] absolute">
            <label for="negara">Nasionality</label>
            <input id="negara" name="negara" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: Dominican Republic" value="<?php echo $tamu['negara'] ?>">
            <span class="error text-red-600" id="negara-error"></span>
            <!-- list negara -->
            <span>
              <!-- <select id="negara" name="negara" class="w-60 h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex">
            <option value="<?php echo $tamu['negara'] ?>"><?php echo $tamu['negara'] ?></option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select> -->
            </span>
          </div>
          <div class="w-72 h-20 left-[0px] top-[225px] absolute">
            <label for="jenis_kelamin">Gender</label>
            <input id="jenis_kelamin" name="jenis_kelamin" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: Dominican Republic" value="<?php echo $tamu['jenis_kelamin'] ?>">
        </fieldset>
        <!-- <select name="jenis_kelamin" id="jenis_kelamin" class="w-60 h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex">
              <option value="">Choose Gender</option>
              <option value="man">Man</option>
              <option value="womanan">Woman</option>
            </select> -->
        <!-- <input id="jenis_kelamin" name="jenis_kelamin" class="h-12 px-3.5 py-2.5 left-0 top-[28px] absolute bg-white rounded border border-black flex-col justify-start items-start inline-flex" placeholder="ex: Man" value="<?php echo $tamu['jenis_kelamin'] ?>"> -->
        <span class="error text-red-600" id="jenis_kelamin-error"></span>
    </div>
    <input type="hidden" id="adults" name="dewasa" value="<?php echo $kamar['adults']; ?>">
    <input type="hidden" id="kids" name="anak" value="<?php echo $kamar['kids']; ?>">
    <input type="hidden" id="rooms" name="jumlah_kamar" value="<?php echo $kamar['rooms']; ?>">
    <input type="hidden" id="checkin" name="tgl_checkIn" value="<?php echo $kamar['checkin']; ?>">
    <input type="hidden" id="checkout" name="tgl_checkOut" value="<?php echo $kamar['checkout']; ?>">
  </div>
  </form>
</div>

<div class="left-[381px] top-[526px] absolute w-3/12 h-2/5 bg-white shadow rounded">

  <div class="left-[0px] top-[0px] absolute w-1/2 h-1/2">
    <div class="w-96 h-64 left-[0px] top-[0px] absolute">
      <div class="w-40 h-5 left-[26px] top-[19px] absolute text-black text-xl font-bold leading-7">Booking Details</div>
      <div class="w-32 h-14 left-[26px] top-[65px] absolute">
        <div class="w-22 h-5 left-[33px] top-0 absolute text-black text-md font-bold leading-7">Check-in</div>
        <div id="start_date" class="w-40 h-5 left-0 top-[33px] absolute text-black text-md font-normal leading-7"><?php echo $kamar['checkin'] ?></div>
      </div>
      <div class="w-32 h-14 left-[230px] top-[65px] absolute">
        <div class="w-22 h-5 left-[20px] top-0 absolute text-black text-md font-bold leading-7">Check-out</div>
        <div id="end_date" class="w-36 h-5 left-0 top-[33px] absolute text-black text-md font-normal leading-7"><?php echo $kamar['checkout'] ?></div>
      </div>
      <div class="w-28 h-14 left-[55px] top-[166px] absolute">
        <div class="w-28 h-7 left-0 top-0 absolute text-black text-md font-bold leading-7">Total nights</div>
        <div id="night" class="w-20 h-5 left-0 top-[32px] absolute text-black text-md font-normal leading-7">1 Nights</div>
      </div>
      <div class="left-[250px] top-[166px] absolute">
        <div class="w-28 h-7 left-[0px] top-[0px] absolute text-black text-md font-bold leading-7">Requirements</div>
        <div class="w-28 h-5 left-[0px] top-[32px] absolute text-black text-md font-normal leading-7">Rooms <?php echo $kamar['rooms'] ?></div>
        <div class="w-28 h-5 left-[0px] top-[60px] absolute text-black text-md font-normal leading-7">Adult <?php echo  $kamar['adults'] ?> Kids <?php echo $kamar['kids'] ?></div>
      </div>
      <div class="w-16 h-px left-[200px] top-[65px] absolute origin-top-left rotate-90 border border-black"></div>
    </div>
  </div>
</div>

<div class="left-[800px] top-[526px] absolute w-3/12 h-2/5 bg-white shadow rounded">
  <div class="left-[0px] top-[0px] absolute">
    <div class="w-40 h-6 left-[26px] top-[18.05px] absolute text-black text-xl font-bold leading-7">Price Details</div>
    <div class="w-32 h-14 left-[26px] top-[65.50px] absolute text-black text-md font-normal leading-7">Room price<br /><span class="text-sm text-gray-500"><?php echo $kamar['rooms'] ?> Rooms</span><span id="night2" class="text-sm text-gray-500"></span></div>
    <?php $price = $harga * $kamar['rooms'] ?>
    <div id="calPrice" data="<?php echo $price ?>"></div>
    <div id="price" class="w-24 h-7 left-[270px] top-[74.27px] absolute text-black text-md font-normal leading-7"></div>

    <div class="w-32 h-7 left-[26px] top-[140.28px] absolute text-black text-md font-normal leading-7">Taxes and fees</div>
    <div id="priceTax" class="w-24 h-7 left-[270px] top-[140.28px] absolute text-black text-md font-normal leading-7"></div>

    <div class="w-80 h-px left-[33px] top-[194.95px] absolute border border-black"></div>

    <div class="w-40 h-6 left-[26px] top-[206.30px] absolute text-black text-base font-bold leading-7">Total price</div>
    <div id="total_price" class="w-24 h-7 left-[270px] top-[206.30px] absolute text-black text-md font-bold leading-7"></div>

    <button id="submit-details" class="absolute w-52 h-10 bg-blue-500 text-white mt-4 mb-5 rounded left-[100px] top-[230px] bg-red-500">
      Continue To Payment
    </button>
  </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get the checkin date from PHP
    let checkinDate = "<?php echo $kamar['checkin']; ?>";
    console.log(checkinDate);
    // Format the date using moment.js
    let formattedCheckinDate = moment(checkinDate).format('ddd D MMMM YYYY');
    console.log(formattedCheckinDate);

    // Set the formatted date into the input
    document.getElementById('start_date').innerText = formattedCheckinDate;

    let checkoutDate = "<?php echo $kamar['checkout']; ?>";
    // Format the date using moment.js
    let formattedCheckoutDate = moment(checkoutDate).format('ddd D MMMM YYYY');
    console.log(formattedCheckoutDate);

    // Set the formatted date into the input
    document.getElementById('end_date').innerText = formattedCheckoutDate;

    // Calculate nights using moment.js
    let checkin = moment(checkinDate);
    let checkout = moment(checkoutDate);
    let nights = checkout.diff(checkin, 'days');
    console.log(nights);
    document.getElementById('night').innerText = nights + " Nights";
    document.getElementById('night2').innerText = "(" + nights + " Nights)";

    var calPriceElement = document.getElementById('calPrice')
    var calPriceValue = calPriceElement.getAttribute('data')
    var price = parseFloat(calPriceValue) * parseFloat(nights)
    var priceTaxValue = parseFloat(calPriceValue) * 0.11
    var total = price + priceTaxValue

    function formatRupiah(value) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }).format(value);
    }

    document.getElementById('price').innerText = formatRupiah(price);
    document.getElementById('priceTax').innerText = formatRupiah(priceTaxValue);
    document.getElementById('total_price').innerText = formatRupiah(total);

  });

  $(document).ready(function() {
    $('#submit-details').click(function(event) {
      event.preventDefault();

      // Clear previous error messages
      $('.error').text('');

      let isValid = true;

      // Get form values
      let username = $('#username').val();
      let noTelp = $('#no_telp').val();
      let email = $('#email').val();
      let negara = $('#negara').val();
      var jenisKelamin =  $('#negara').val();

      // Validate full name
      if (!username) {
        isValid = false;
        $('#username-error').text('Full name is required.');
      }

      // Validate telephone number
      let telpPattern = /^[0-9]{10,15}$/;
      if (!noTelp || !telpPattern.test(noTelp)) {
        isValid = false;
        $('#no_telp-error').text('Valid telephone number is required.');
      }

      // Validate email
      let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!email || !emailPattern.test(email)) {
        isValid = false;
        $('#email-error').text('Valid email is required.');
      }

      // Validate nationality
      if (negara == 'Pilih Negara') {
        isValid = false;
        $('#negara-error').text('Nationality is required.');
      }

      // Validate gender
      if (!jenisKelamin) {
        isValid = false;
        $('#jenis_kelamin-error').text('Gender is required.');
      }
      console.log(isValid);

      if (isValid) {
        // $('#reservation-form').submit();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('pemesanan/createpemesanan'); ?>",
          data: {
            username: username,
            no_telp: noTelp,
            email: email,
            negara: negara,
            jenis_kelamin: jenisKelamin.value,
          },
          dataType: "json",
          success: function(response) {
            // console.log(response.pemesanan.id_pemesanan)
            //console.log(response.pemesanan[0])
            var order = response.pemesanan[0]
            //console.log(order.id_pemesanan)

            if (response.status == 'Fail') {
              Swal.fire({
                title: response.status,
                text: response.message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Back',
                confirmButtonText: 'Ok',

              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = base_url + 'pemesanan/payment/' + order.id_pemesanan;
                }
              });
            } else {
              window.location.href = base_url + 'pemesanan/payment/' + order.id_pemesanan;
            }

          },
          error: function(xhr, status, error) {
            console.error("Error:", error);
          }
        });
      }
    });
  });
</script>