window.onload = loadPage(1, assignClickActionForAllButtons);


//Global variable
var currentPage = 1;

                                   //Reload page with AJAX
     function loadPage (page, callBackFunctionForAllButtons) {
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("employeesPage").innerHTML = this.responseText;
                    callBackFunctionForAllButtons();
               }
          };

          xmlhttp.open("GET", "/ajax/loadCurrentEmployeesPage.php?page=" + page);
          xmlhttp.send();
     }


     function assignClickActionForAllButtons() {
          assignClickActionPaginator();
          assignClickButtonDetail();
          assignClickButtonAddNew();
          attachSuggestionForInputField();
     }


                                  //Load employee info with AJAX (for form)
     function loadEmployeeInfo (idEmpl, callBackFunctionForSaveButton, callBackFunctionForTelepfoneField) {
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("formIdEmpl").innerHTML = this.responseText;
                    callBackFunctionForSaveButton();
                    callBackFunctionForTelepfoneField();
               }
          };

          xmlhttp.open("GET", "/ajax/loadEmployeeInfo.php?idEmpl=" + idEmpl);
          xmlhttp.send();
     }


                                  //UpLoad new info about employee with AJAX

     function  uploadNewInfoEmployee() {
          var form = document.forms.formEmployee;
          var data = new FormData(form);

          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {
                    var responseBD = JSON.parse(this.responseText);

                    if (responseBD[0] == 1) {
                         alert (responseBD[1]);
                         loadPage(currentPage, assignClickActionForAllButtons);
                    } else {
                         alert (responseBD[1]);
                    }
               }
          };

          xmlhttp.open("POST", "/ajax/editAddEmployee.php");
          xmlhttp.send(data);
     }



                                   // Function for "Add new" button (iDEmpl is "NEW_EMPL")

     function assignClickButtonAddNew() {
          document.getElementById("addNew").onclick = function () {
               //For new employee
               showForm("NEW_EMPL", assignClickButtonSave, assignOnChangeTelephoneField);
          };
     }

     function assignClickButtonSave() {
          document.getElementById("saveButton").onclick = function () {
               //For new employee
               var form = document.forms.formEmployee;
               if(form.checkValidity()) {
                    uploadNewInfoEmployee();
                   return false;
               }
          };
     }


                                   // Function for telephone field

     function assignOnChangeTelephoneField() {
          document.getElementById("tel").onkeyup = function (event) {
               var field = this;
               changeTelephoneField(event, field);
          };
     }


     function changeTelephoneField(event, field) {
          if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
               var length = field.textLength;

               switch (length) {
                    case 1:
                         var patt = /\d{1}/;
                         if (patt.test(field.value)) {
                               field.value = "(" + field.value;
                         }
                         break;
                    case 4:
                         var patt4 = /\(\d{3}/;
                         if (patt4.test(field.value)) {
                              field.value = field.value + ")";
                         }
                         break;
                    case 8:
                         var patt8 = /\(\d{3}\)\d{3}/;
                         if (patt8.test(field.value)) {
                              field.value = field.value + "-";
                         }
                         break;
                    case 11:
                         var patt11 = /\(\d{3}\)\d{3}-\d{2}/;
                         if (patt11.test(field.value)) {
                              field.value = field.value + "-";
                         }
                         break;
                    case 15:
                         field.value = field.value.substring(0, 14);
                         break;
               }
          }
     }














                                   // Functions for buttons "Detail" in table  (Show info for current employee in form)

     function assignClickButtonDetail() {
          document.getElementById("tableEmpl").onclick = function (event) {
               showDatails(event);
          };
     }

     function toggleStyleButtonsDetail(clickedButton) {
          var previousActiveButtuns = document.getElementsByClassName("btn-show-record");

          var i;
          for (i = 0; i < previousActiveButtuns.length; i++) {
               previousActiveButtuns[i].setAttribute("class", "btn-edit-record");
          }
          clickedButton.setAttribute("class", "btn-show-record");
     }


     function showDatails(event) {
         var target = event.target;

         while (target.tagName != "TABLE") {
             if (target.tagName == 'BUTTON') {
               toggleStyleButtonsDetail(target);
               var idEmpl = getIdEmployee(target);
               showForm(idEmpl, assignClickButtonSave, assignOnChangeTelephoneField);
               return;
             }
             target = target.parentNode;
         }
     }

     function getIdEmployee (target) {
         var tableRow = target.parentNode.parentNode;
         var nodeListTD = tableRow.querySelectorAll("TD");

         // Look employeesView.php   STRING    $strPrint .= '<td style="display:none" >' . $val["idEmployee"] . '</td>';
         var idEmpl = nodeListTD[0].innerHTML;
         return idEmpl;
     }

     function showForm (idEmpl, assignClickButtonSave, assignOnChangeTelephoneField) {
          loadEmployeeInfo(idEmpl, assignClickButtonSave, assignOnChangeTelephoneField);
          document.getElementById("formEmpl").style.display = "";
     }



                                      // Functions for paginator (Reload pages)

     function assignClickActionPaginator () {
          var paginator = document.getElementById("pagination-bar");

          paginator.onclick = function(event) {
               var target = event.target;

               while (target != paginator) {
                    if (target.tagName == 'A') {
                         //window.currentPage (Global variable)
                         currentPage = extractNumberPage(target);
                         //Reload page with AJAX
                         loadPage(currentPage, assignClickActionForAllButtons);
                         event.preventDefault();
                         return;
                    }
                    target = target.parentNode;
               }

               event.preventDefault();
          };
     }

     function extractNumberPage(target) {
         // get number of page from url
          var link = target.getAttribute("href");
          var posEquelMask = link.lastIndexOf("=");
          var page = link.substr(posEquelMask + 1);
          return page;
     }

                                   // SEACHER

     function attachSuggestionForInputField() {
          var nameElement = "suggetInput";
          var fields = document.getElementsByName("suggetInput");
          fields[0].onkeyup = function() {showHint(this.value , showAllSuggestion, nameElement);};
     }

     function showHint(str, cFunc, nameElement) {
          if (str.length >= 1 ) {


               var xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                         cFunc(this, nameElement);
                    }
               };

               xhttp.open("GET", "/ajax/gethint.php?str=" + str + "&fieldSearch=" + nameElement, true);
               xhttp.send();
          }
     }




     function showAllSuggestion(xhttp, nameElement) {
         var datalist = document.getElementById(nameElement);
          var length = datalist.options.length;

          for (i = length-1; i >= 0; i--) {
               datalist.removeChild(datalist.options[i]);
          }

         var str = xhttp.responseText;
         var optionElement;

          if (str == "no suggestion") {
               optionElement = document.createElement("option");
               optionElement.value = "no suggestion";
               datalist.appendChild(optionElement);
          } else {
               var resArray = str.split(",");
               var lengthResult = resArray.length;

               for (i = 0; i < lengthResult; i++) {
                    optionElement = document.createElement("option");
                    optionElement.value = resArray[i];
                    datalist.appendChild(optionElement);
             }
         }
             datalist.focus();
     }
