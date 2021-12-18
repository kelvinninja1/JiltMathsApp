const objSet = [];

let studentName = '';
let recordList = [];
let mode = "interactive";

let levelName = '';
let levelQNs = '';
let testDate = '';
let quizDate = '';
let fromTime = '';
let toTime = '';
const objectivesInstructions = "Choose from the multi-choice options";
let homeView = "";
let quizView = "";

function loadPages() {
  homeView = getPageView("#homeView");
  quizView = getPageView("#quizView");
}

function getPageView(viewID) {
  let viewData = $(viewID).html();
  $(viewID).html("");
  return viewData;
}

$(document).ready(function(){
  loadPages();
   // Show the Modal on load
  checkAccount();
  activateMode();
  console.log("What is mode again: "+mode);
  console.log("homepage is active");
  $('#main-contentArea').html(homeView);

});

function study(level){
  const QNsID = 'level' + level + '-QNs';
  console.log(QNsID);
  const QNs = $('#' + QNsID).val();
  levelName = "Level "+level;
  levelQNs = QNs;

  console.log("Study button Clicked");
  // var level = $(this).attr("level");
  console.log(level);
  console.log(QNs);

 $('#main-contentArea').html(quizView);
 $('#level-header').html(levelName+' Maths - '+levelQNs+ ' MCQs');
 $('#objectives-instructions').html(objectivesInstructions);
 fetchJSON('mcq/level/'+level+'/qns/', levelQNs);
 testDate = new Date();
  const realMonth = testDate.getMonth() + 1;
  quizDate = testDate.getFullYear()+'/'+realMonth+'/'+testDate.getDate();
 fromTime = testDate.getHours()+':'+testDate.getMinutes();

  const sideAssessmentView = '<h2 style="font-size: 16px; margin-bottom: 15px; font-weight: 700;">' + levelName + ' Maths - ' + levelQNs + ' MCQs' + '</h2><a class="btn btn-primary" onclick="viewAssessment()" data-toggle="modal" data-target="#assessModal">VIEW ASSESSMENT</a>';
  $("#Side-Assesment").html(sideAssessmentView);
 // quizDate = new Date('yr');

}

function fetchJSON(linkHead, linkTail) {
  const link = linkHead + linkTail;
  const ourRequest = new XMLHttpRequest();
  ourRequest.open('GET', link);
  ourRequest.onload = function(){
    const ourData = JSON.parse(ourRequest.responseText);
    // console.log(ourData);
    renderHTML(ourData);
  };
  ourRequest.send();
}

function renderHTML(data) {
  // var mainArea = getElementByID("main-area");
  let htmlString = '';
  let countNo = 1;
  const length = data.length;
  for(i = 0; i < length; i++){

    const optionE = '';
    if (data[i].type === 'quiz') {
      const objObject = {
        "num": countNo,
        "no": data[i].no,
        "answer": data[i].answer,
        "choice": "",
        "mark": 0
      };
      objSet.push(objObject);
      //console.log(objSet);

      htmlString += '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#main-area" href="#collapse'+data[i].no+'" class="collapsed">#'+countNo+'. '+data[i].question+' <i class="fa fa-angle-down right icon-collapsed"><span class="text-primary">Choose:</span></i><i class="fa fa-angle-up right icon-expanded"><span class="text-primary"></span></i><h5 class="text-primary">Choice:<span id="choice-q'+data[i].no+'"></span></h5></a></h4></div><div id="collapse'+data[i].no+'" class="panel-collapse collapse"><div class="panel-body"><form class=""><label><input type="radio" name="obj-q'+data[i].no+'" value="A" onclick="choose(\'A\', '+countNo+')">A. '+data[i].options.A+' </label><br/><label><input type="radio" name="obj-q'+data[i].no+'" value="B" onclick="choose(\'B\', '+countNo+')">B. '+data[i].options.B+' </label><br/><label><input type="radio" name="obj-q'+data[i].no+'" value="C" onclick="choose(\'C\', '+countNo+')">C. '+data[i].options.C+' </label><br/><label><input type="radio" name="obj-q'+data[i].no+'" value="D" onclick="choose(\'D\', '+countNo+')">D. '+data[i].options.D+' </label>'+optionE+'</form></div></div></div>';

      countNo++;
    } else if(data[i].type === 'instructions'){
      htmlString += '<br/><p>'+data[i].note+'</p><br/>';
    } else if(data[i].type === 'title'){
      htmlString += '<br/><center><h3><b>'+data[i].note+'<b></h3></center><br/>';
    }



  }

  // View Assessment Button
  htmlString += '<div class="margin-bottom-30"></div><button onclick="viewAssessment()" data-toggle="modal" data-target="#assessModal" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> VIEW ASSESSMENT</button>';


  $(htmlString).appendTo('#main-area')
}

function choose(choice, num){
  const findNum = num - 1;
  const choiceSpot = "choice-q" + objSet[findNum].no;
  objSet[findNum].choice = choice;
   $('#'+choiceSpot).html(choice);
  // var quizObject = objSet[findNum];
  if (choice === objSet[findNum].answer) {
    objSet[findNum].mark = 1;
    console.log("Correct Choice: "+mode);
    if (mode !== "focus") {
      console.log("Correct Choice: "+mode);
      toastr['success']("Correct Choice");
    }
  } else {
    objSet[findNum].mark = 0;
    console.log("Wrong Choice: "+mode);
    if (mode !== "focus") {
      console.log("Wrong Choice: "+mode);
      toastr['error']("Wrong Choice");
    }
  }
  console.log("#"+num+" Answer Chosen: "+choice);
}


function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  const expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  const name = cname + "=";
  const ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkAccount() {
  studentName = getCookie("studentName");
  if (studentName !== "") {
    getReady();
  recordList = getCookie("recordList");
    if (recordList !== "") {
      recordList = JSON.parse(getCookie("recordList"));
      // recordListView(recordList);
    } else {
      recordList = [];
    }
  } else {
      $("#startupModal").modal("show");
  }
}

function registerAccount() {
  // $("#startupModal").modal("dismiss");
  const studentInput = $("#startupInput").val();
  console.log("Input: "+studentInput);
  if (studentInput !== "" && studentInput != null) {
    // setting cookie for 3 years
    setCookie("studentName", studentInput, 1095);
    checkAccount();
  } else {
      $("#startupModal").modal("show");
  }
}

function resetAccount(){
  setCookie("studentName", "", -1100);
  setCookie("mode", "", -1100);
  resetRecords();
}

function resetRecords(){
  setCookie("recordList", "", -1100);
  window.location.reload();
}

function getReady(){
  $(".student-name").text(studentName);
}

function checkMode(){
  const newMode = getCookie("mode");
  if (newMode !=="") {
    mode = "focus";
  } else {
    mode = "interactive";
  }
  return mode;
}

function activateMode(){
  console.log("Mode Activation Began");
  showRecordView()
  mode = checkMode();
  console.log("The Mode is:"+mode);
  if (mode === "interactive") {
    $(".focus-view").hide();
  } else if (mode === "focus") {
    $(".interactive-view").hide();
  }
}

function changeMode(newMode){
  if (newMode === "interactive") {
    setCookie("mode", "", -1100);
  } else if (newMode === "focus") {
    setCookie("mode", "focus", 1095);
  }
  window.location.reload();
}

function viewAssessment(){
  let score = 0;
  let mark = '';
  let quizColumns = '';
  let counter = 0;
  const sheetHeading = '<h3 class="heading"><i class="fa fa-square"></i>' + levelName + ' - ' + levelQNs + ' Questions </h3><a href="#" class="right">Your choices and results are as follows.</a>';
  $("#sheet-heading").html(sheetHeading);
  let sheetBody = '';
  testDate = new Date();
    toTime =testDate.getHours()+':'+testDate.getMinutes();
  const length = objSet.length;
  for (let i = 0; i < length; i++) {
      score += objSet[i].mark;
      counter++;
      // objSet[i].num;
      // objSet[i].choice;
      // objSet[i].answer;
      if (objSet[i].mark > 0) {
        mark = '<span class="text-primary">| Correct Choice</span>';
      } else {
        mark = '<span class="text-danger">| Wrong Choice</span>';
      }

      quizColumns += '<div class="col-md-6 col-sm-6"><h4><i class="fa fa-hashtag"></i>'+counter+'. '+objSet[i].choice+'  '+mark+'</h4></div>'
    }
  const recordObject = {
    "levelName": levelName,
    "levelQNs": levelQNs,
    "score": score,
    "total": length,
    "date": quizDate,
    "fromTime": fromTime,
    "toTime": toTime
  };
  recordList.push(recordObject);
    saveRecords();

    sheetBody = '<h1 class="page-title text-primary"> <strong>Score:</strong> '+score+' out of <strong>'+length+'</strong></h1><div class="row">'+quizColumns+'</div><p><strong>Date:</strong>'+quizDate+' From: '+fromTime+' to '+toTime+'</p>';
    // console.log("Length: "+length);

    $("#sheet-body").html(sheetBody);
    $("#assess-loader").show();
    $("#assess-loader").fadeOut(3000);



}

function saveRecords(){
  const newRecordList = JSON.stringify(recordList);
  console.log(newRecordList);
  setCookie("recordList", newRecordList, 1095);
  showRecordView();
}

function showRecordView(){
  const count = recordList.length;
  let listItems = '<li class="header"><strong>You have <span id="assessment-count"> ' + count + ' </span> Assessment Records</strong></li>';
  // $("#assessment-count").html(count);
  for (let i = 0; i < count; i++) {
    listItems += '<li><a href="#"><div class="media"><div class="media-left"><i class="fa fa-fw fa-flag-checkered text-muted"></i></div><div class="media-body"><p class="text"><strong><span>'+recordList[i].levelName+'</span></strong> <span>'+recordList[i].levelQNs+' on '+recordList[i].date+' '+recordList[i].fromTime+' - '+recordList[i].toTime+'</span></p><span class="timestamp">Score: '+recordList[i].score+' out of '+recordList[i].total+'</span></div></div></a></li>';
  }
  listItems += '<li class="footer"><a onclick="resetRecords()" class="more">Clear Records</a></li>';
  $("#records-view").html(listItems);

}
