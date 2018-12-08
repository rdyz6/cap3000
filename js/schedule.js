
var g_array = [];///global array store  course object
var g_array_detail = [];
var g_array_greedy = [];
var g_array_lap=[];
var array_replace = [];//the course which will be delete
var g_array_new = [];
var array_recommend = [];//recommend course is coming!!!!!!
function myFunction() {
     var input, filter, table, tr, td, i;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
     td = tr[i].getElementsByTagName("td")[1];
     if (td) {
     if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    
  }
}
        
        function searchfunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("major");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1 && filter!="ALL") {
        tr[i].style.display = "";
        }else if(filter == "ALL"){
        tr[i].style.display = "";
        }else {
        tr[i].style.display = "None";
        }}}}
        
        
        function get_num(){
            
            document.getElementById("passarray").disabled = true;
            document.getElementById("card_info").innerHTML = "";
             document.getElementById("mo").innerHTML = "";
            document.getElementById("tu").innerHTML = "";
            document.getElementById("we").innerHTML = "";
            document.getElementById("th").innerHTML = "";
            document.getElementById("fr").innerHTML = "";
            
            g_array = [];
            g_array_detail = [];
            g_array_greedy = [];
            g_array_lap = [];
            array_replace = [];
            
            g_array_new = [];
            array_recommend = [];//recommend course is coming!!!!!!
            var table, tr, td;
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            var c_num = document.getElementById("selection_num").value;
            console.log(c_num);
            for(var i =0; i< tr.length-1;i++){
                   var id = "checkbox" + i;
                   document.getElementById(id).disabled=false;
                   console.log("enable");
                   
                
            }
            for(var i = 0; i< tr.length -1; i++){
                var id = "checkbox" + i;
                document.getElementById(id).checked = false;
            }
            
            
            $('input[type=checkbox]').on('change', function (e) {
                c_num = document.getElementById("selection_num").value;
                if ($('input[type=checkbox]:checked').length > c_num ) {
                    $(this).prop('checked', false);
                    document.getElementById("demo").innerHTML = "<div class='alert alert-warning custom-alert' id='warning-alert'  role='alert'><button type='button' class='close' data-dismiss='alert'>X</button><strong>Tou can only choose "+" "+c_num+" "+" courses. </strong></div>";
                    window.setTimeout(function() {
                    $(".custom-alert").slideUp(500, function() {
                        $(this).remove();});
                    }, 1500);
//                    for(var i =0; i< tr.length-1;i++){
//                    var id = "checkbox" + i;
//                    document.getElementById(id).disabled=true;
//                    console.log("disable");
//                   
//                
//            }
                    
                }});
        }
///-----------------------------------------------------This list is serve for g_array
        function list(id,name,time,tea,gpa,agscore){
            this.id = id;
            this.name = name;
            this.time = time;
            this.tea = tea;
            this.gpa = gpa;
            this.agscore = agscore;
        }
///--------------------------------------------------------------------------------end
///-------------------------------------------------------print student choosen course
        var checkindex = 0;
        function print_course(id,name,time,tea,gpa,agscore){
            
            var courselist = new list(id,name,time,tea,gpa,agscore,agscore);
            var table, tr, td;
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            var c_num = document.getElementById("selection_num").value;
            var check = false;
            var length = g_array.length;
            
            if(length > 0){
                for(var i = 0; i < length; i++){
                    if(g_array[i].id == courselist.id){
                        
                        check = true;
                        console.log("Same element delete.");
                        g_array.splice(i,1);
                    }
                    if( i == c_num-1){
                        check = true;
                        console.log("No more insert");
                    }
                   
                }
            }
            
            if(check == false){
                g_array.push(courselist);
                console.log(checkindex + "Insert");
                checkindex++;
            }
             document.getElementById("card_info").innerHTML = "";
             
        }
        

        
        
        function print_array(){
            
            ///use color to judge class's level
            var array_style = ["card bg-light mb-3","card text-white bg-info mb-3","card text-white bg-warning mb-3", "card text-white bg-success mb-3"];
            ///inside array for condition
            var array_inside = array_style.slice();
            if(g_array.length<document.getElementById("selection_num").value || g_array[0] == null){
                console.log("Course number is not enough.");
                var dif = document.getElementById("selection_num").value -g_array.length;
                
                document.getElementById("demo").innerHTML = "<div class='alert alert-warning custom-alert' id='warning-alert'  role='alert'><button type='button' class='close' data-dismiss='alert'>x</button><strong>Warning </strong>You only choose" +" "+ g_array.length + " "+"courses" + "<br>please choose"+" " + dif +" "+" more.</div>";
                
                window.setTimeout(function() {
                    $(".custom-alert").slideUp(500, function() {
                        $(this).remove();});
                }, 1500);

            }
            else{
                document.getElementById("demo").innerHTML = "";
                document.getElementById("demo").innerHTML = "<div class='alert alert-success custom-alert' id='warning-alert' role='alert'><button type='button' class='close' data-dismiss='alert'>x</button><strong>Submit Success!</strong><br>Your schedule is loading.</div>";
                for(var i =0; i<document.getElementById("selection_num").value;i++){
                //console.log(g_array[i]);
                var x;
                if(g_array[i].time == "TBA"){
                    x = 0;
                }
                else if(g_array[i].agscore < 3){
                    x = 1;
                }
                else if(g_array[i].agscore >= 3 && g_array[i].agscore < 4){
                    x = 2;
                }
                else if(g_array[i].agscore >= 4){
                    x = 3;
                }
                oldHTML = document.getElementById("card_info").innerHTML;
                document.getElementById("card_info").innerHTML = oldHTML + "<div class='"+array_style[x]+"' style='width: 55rem; height: 13rem ; text-align:center;display:inline-block;'><div class='card-body'><h5 class='card-title'>"+"Course Name:<label></label>"+g_array[i].name+"</h5><h6 class='card-subtitle mb-2 text-muted'>"+"<label></label>ID:<label></label>"+g_array[i].id+"</h6><p class='card-text'>"+"<label></label>Time:<label></label>"+g_array[i].time+"</p>" + "</h6><p class='card-text'>" +"<label></label>Instructor:<label></label>"+ g_array[i].tea +"</p>" + "</h6><p class='card-text'>"+"<label></label>Average Gpa:<label></label>"+ g_array[i].gpa + "<br>Advance Score:"+ g_array[i].agscore.toFixed(2) +"</p>" +  "<hr>" + "</div></div>" + "";
                array_inside.splice(x,1);
                }
                window.setTimeout(function() {
                    $(".custom-alert").slideUp(500, function() {
                        $(this).remove();});
                }, 1500);
                document.getElementById("passarray").disabled = false;
            }
            get_schedule();
        }
        
      
         
        function get_detail(){
            for(var i = 0; i< g_array.length; i++){
                var mylist = {
            id:"",name:"",date: [],stime:"",etime:"",gpa:"",agscore:"",interval:""
                }
                
                var check = 0;//for while loop, check length of string
                var str = g_array[i].time;
                var n = str.indexOf(" ");
                var time = str.slice(n+1);
                var n2 = time.indexOf("-");
                var etime = time.slice(n2+2);
                var stime = time.slice(0,n2-1);
                var date = str.slice(0,n+1);
                
                
                 
                if(g_array[i].time == "TBA"){
                    mylist.stime = "TBA";
                    mylist.etime = "TBA";
                    mylist.id = g_array[i].id;
                    mylist.gpa = g_array[i].gpa;
                    mylist.name = g_array[i].name;
                    mylist.interval = "TBA";    
                    g_array_detail.push(mylist);
                    
                }
                else{
                     while(check < date.length-2){mylist.date.push(date.slice(check,check+2));
                                                  check += 2;
                     }
                 mylist.stime = start(stime);
                 mylist.etime = end(etime);
                 mylist.id = g_array[i].id;
                 mylist.gpa = g_array[i].gpa;
                 mylist.name = g_array[i].name;
                 mylist.interval = calculateTime(stime,etime);
                 mylist.agscore = g_array[i].agscore;
                 g_array_detail.push(mylist);
                }
                 
                 
            }
            
            
        }
        
        
///-----------------------------------------------------------------calculate interval
        
        function calculateTime(start,end){
            var h_s,h_e,m_s, m_e;
            var interval;//two time's difference.
            var result_s,result_e;
            if(start.includes("PM") == true){
                var str = start;
                var n = str.indexOf(":");
                var n2 = str.slice(n-1, n);
                if(str.slice(n-2, n) == 12 || str.slice(n-2, n) == 11 || str.slice(n-2, n) == 10){
                    var n3 = "2018 " + str.replace("PM", "");
                    result_s = n3;
                }
                else{
                    for(var i= 0;i <12; i++){
                        n2++;
                    }
                    var n3 = str.slice(n);
                    var n3 = n2+n3;
                    var n3 = "2018 " + n3.replace("PM", "");
                    result_s = n3;
                }
            }
            if(start.includes("AM") == true){
                result_s ="2018 " + start.replace("AM","");
            }
            if(end.includes("PM") == true){
                var str = end;
                var n = str.indexOf(":");
                var n2 = str.slice(n-1, n);
                if(str.slice(n-2, n) == 12 || str.slice(n-2, n) == 11 || str.slice(n-2, n) == 10){
                    var n3 = "2018 " + str.replace("PM","");
                    result_e = n3;    
                }
                else{
                    for(var i= 0;i <12; i++){
                        n2++;
                    }
                    var n3 = str.slice(n);
                    var n3 = n2+n3;
                    var n3 = "2018 " + n3.replace("PM","");
                    result_e = n3;
                }
            }
            if(end.includes("AM") == true){
                result_e ="2018 " + end.replace("AM","");
            }
            
            
            var stime = new Date(result_s);
            var etime = new Date(result_e);
            h_s = stime.getHours();
            m_s = stime.getMinutes();
            h_e = etime.getHours();
            m_e = etime.getMinutes();
            if(h_s < h_e){
                if(m_s > m_e){
                    interval = 60*(h_e - h_s)-m_s + m_e;
                }
                else if(m_s == m_e){
                    interval = (h_e - h_s)*60;
                }
                else if(m_s < m_e){
                    interval = 60*(h_e - h_s) +  m_e - m_s;
                }
            }
            else if(h_s == h_e){
                interval = m_e - m_s;
            }
            
            return interval;
        }
///------------------------------------------------------------calculate interval done
        
        function advanceSchedule(){
            for(var i =0; i<g_array_detail.length;i++){
                var adlist = {id:false,mo:false,tu:false,we:false,th:false,fr:false,tba:true}
                adlist.id = g_array_detail[i].id;
                
              
                
                    for(var j = 0; j<g_array_detail[i].date.length;j++){
                    
                    if(g_array_detail[i].date.includes("Mo") == true){
                        adlist.mo = true;
                       
                    }
                    if(g_array_detail[i].date.includes("Tu") == true){
                        
                        adlist.tu = true;
                        
                    }
                    if(g_array_detail[i].date.includes("We") == true){
                        
                        adlist.we = true;
                        
                    }
                    if(g_array_detail[i].date.includes("Th") == true){
                        
                        adlist.th = true;
                       
                    }
                    if(g_array_detail[i].date.includes("Fr") == true){
                       
                        adlist.fr = true;
                       
                    }
                    
                    
                }
                
                
                
                g_array_greedy.push(adlist);
                
                
            }
        }
        
///----------------------------------------------------------get correct stand of time
        function start(start){
            var result_s;
            if(start.includes("PM") == true){
                var str = start;
                var n = str.indexOf(":");
                var n2 = str.slice(n-1, n);
                if(str.slice(n-2, n) == 12 || str.slice(n-2, n) == 11 || str.slice(n-2, n) == 10){
                    var n3 = "2018 " + str.replace("PM", "");
                    result_s = n3;
                }
                else{
                    for(var i= 0;i <12; i++){
                        n2++;
                    }
                    var n3 = str.slice(n);
                    var n3 = n2+n3;
                    var n3 = "2018 " + n3.replace("PM", "");
                    result_s = n3;
                }
            }
            if(start.includes("AM") == true){
                result_s ="2018 " + start.replace("AM","");
            }
            return result_s;
            
        }
        function end(end){
            var result_e;
            if(end.includes("PM") == true){
                var str = end;
                var n = str.indexOf(":");
                var n2 = str.slice(n-1, n);
                if(str.slice(n-2, n) == 12 || str.slice(n-2, n) == 11 || str.slice(n-2, n) == 10){
                    var n3 = "2018 " + str.replace("PM","");
                    result_e = n3;    
                }
                else{
                    for(var i= 0;i <12; i++){
                        n2++;
                    }
                    var n3 = str.slice(n);
                    var n3 = n2+n3;
                    var n3 = "2018 " + n3.replace("PM","");
                    result_e = n3;
                }
            }
            if(end.includes("AM") == true){
                result_e ="2018 " + end.replace("AM","");
            }
            return result_e;
        }
        
///----------------------------------------------------- end of get correct time part
/////-------------------------------------------------------------------greedy algorithm
        
        function greedy(){
            for(var i =0;i<g_array_greedy.length;i++){
                var laplist ={
                                    id:"",
                                    lapcourse: []
                            }
                laplist.id = g_array_greedy[i].id;
                for(var j =0;j<g_array_greedy.length;j++){
                    if(g_array_greedy[i].id == g_array_greedy[j].id){
                        var h = 0;
                    }
                    else{
                        if(g_array_greedy[i].mo == true && g_array_greedy[j].mo == true || g_array_greedy[i].tu == true && g_array_greedy[j].tu == true || g_array_greedy[i].we == true && g_array_greedy[j].we == true || g_array_greedy[i].th == true && g_array_greedy[j].th == true || g_array_greedy[i].fr == true && g_array_greedy[j].fr == true){
                            var stime1 = new Date(g_array_detail[i].stime);
                            var etime1 = new Date(g_array_detail[i].etime);
                            var stime2 = new Date(g_array_detail[j].stime);
                            var etime2 = new Date(g_array_detail[j].etime);
                            
//                            if(stime1 == stime2 && etime1 == etime2){
//                                //lap
//                                
//                                
//                                
//                            }
                            //s1s2e2e1
                            if(stime1 < stime2 && etime1 > etime2) {
                                laplist.lapcourse.push(g_array_greedy[j].id);
                                console.log("lap2");
                                console.log(g_array_greedy[i].id + " and "+ g_array_greedy[j].id );
                            }
                            //s1s2e1e2
                            else if(stime1 < stime2 && etime1 > stime2 && etime1 < etime2){
                                //lap
                                
                                
                                laplist.lapcourse.push(g_array_greedy[j].id);
                    
//                                console.log("lap3");
//                                
//                                console.log(g_array_greedy[i].id + " and "+ g_array_greedy[j].id );
                            }
                            //s2s1e2e1
                            else if(stime1 > stime2 && stime1 < etime2 && etime1 > etime2){
                                
                                
                                //lap
                                laplist.lapcourse.push(g_array_greedy[j].id);
//                                console.log("lap4");
//                                console.log(g_array_greedy[i].id + " and "+ g_array_greedy[j].id );
                            }
                            
                            else if(stime1 > stime2 && etime1 < etime2){
                                
                                //lap
                                laplist.lapcourse.push(g_array_greedy[j].id);
//                                console.log("lap5");
//                                console.log(g_array_greedy[i].id + " and "+ g_array_greedy[j].id );
                            }
                            
                            else if(stime1 > etime2){
                                //no\
                                console.log("nope1");
                                
                            }
                            else if(etime1 < stime2){
                                //no\
                                console.log("nope1");
                                
                            }
                            else{
                                
                                //i dont understand why stime1==stime2 && etime1 == etime2 does not working
                                console.log("error");
                                laplist.lapcourse.push(g_array_greedy[j].id);
                                
                                
                                console.log(g_array_greedy[i].id + " and "+ g_array_greedy[j].id );
                            }
                            
                            
                            
                                
                            
                        }
                        
                    }
                    
                }
                g_array_lap.push(laplist);
            }
        }
        
        
///-------------------------------------------------------------------greedy algorithm
        
        function get_schedule(){
            get_detail();
            
            advanceSchedule();
            for(var i = 0; i<g_array_detail.length;i++){
                console.log(g_array_detail[i]);

                
            }
            g_array_new = g_array_detail.slice();
//            for(var i = 0; i<g_array_greedy.length;i++){
//                console.log(g_array_greedy[i]);
//            }
            
            greedy();
//            for(var i = 0; i<g_array_lap.length;i++){
//                console.log(g_array_lap[i]);
//            }
            delete_schedule();
            console.log("Some schedule is deleting.");
            for(var i = 0; i<array_replace.length;i++){
                console.log("XXXX"+array_replace[i]+"XXXXX");
                
            }
//            
            get_recommend();
//            for(var i = 0; i<array_recommend.length;i++){
//                console.log("-----");
//                console.log(array_recommend[i]);
//                console.log("-----");
//            }
//            
//            for(var i = 0; i<g_array_new.length;i++){
//                console.log("*******");
//                console.log(g_array_new[i]);
//                console.log("*******");
//            }
            
        }
//--------------------------------------------------------------------------------
//this is using for get id from g_array_detail
        function searchvalue(arraytosearch, key, valuetosearch){
            for (var i = 0; i < arraytosearch.length; i++) {
                if (arraytosearch[i][key] == valuetosearch) {
                    return i;
                }
            }
            return null;
        }
//-----------------------------------------------------------------------------end
        function delete_schedule(){
            for(var i =0; i<g_array_lap.length;i++){
                var youfail = false;
                
                if(g_array_lap[i].lapcourse.length>0){
                    youfail = false;
                    for(var j =0 ; j<g_array_lap[i].lapcourse.length; j++){
                        
                        if(g_array_detail[searchvalue(g_array_detail,"id",g_array_lap[i].id)].agscore.toFixed(2) < g_array_detail[searchvalue(g_array_detail,"id",g_array_lap[i].lapcourse[j])].agscore.toFixed(2)){
//                            console.log("small" + g_array_lap[i].id);
                            youfail = true;
                        }
                        
                    }
                         
                }
                if(youfail == true){array_replace.push(g_array_lap[i].id);}
            }
            
            for(var j = 0;j<array_replace.length;j++){
                g_array_new.splice(searchvalue(g_array_new, "id", array_replace[j]),1);
            }
           
            
        }

        function get_recommend(){
            var table, tr, td;
            table = document.getElementById("myTable");
            
            tr = table.getElementsByTagName("tr");
            for (var i = 0; i < tr.length; i++) {
                var mylist = {id:"",name:"",date:"",instructor:"",agscore:"",gpa:""
                }
                var check = false;
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                  if(td.innerHTML > 4 && searchvalue(g_array_detail, "id", tr[i].getElementsByTagName("td")[0].innerHTML) == null && tr[i].getElementsByTagName("td")[2].innerHTML != "TBA" ){
                      mylist.id = tr[i].getElementsByTagName("td")[0].innerHTML;
                      mylist.name =tr[i].getElementsByTagName("td")[1].innerHTML;
                      mylist.date = tr[i].getElementsByTagName("td")[2].innerHTML;
                      mylist.instructor = tr[i].getElementsByTagName("td")[3].innerHTML;
                      mylist.gpa = tr[i].getElementsByTagName("td")[5].innerHTML;
                      mylist.agscore = tr[i].getElementsByTagName("td")[4].innerHTML;
                      check = true;
                  }
                
                }
                if(check == true){
                    array_recommend.push(mylist);
                }
            }
            
            
        }
        function print_advance_schedule(){
             
                        
            for(var i = 0;i<g_array_new.length;i++){
                var oldHTML_mo = document.getElementById("mo").innerHTML;
                console.log("Mo UL" + oldHTML_mo);
                var oldHTML_tu = document.getElementById("tu").innerHTML;
                var oldHTML_we = document.getElementById("we").innerHTML;
                var oldHTML_th = document.getElementById("th").innerHTML;
                var oldHTML_fr = document.getElementById("fr").innerHTML;
                if(g_array_new[i].date.length >0){
                    
                    
                    
                       
                        if(g_array_new[i].date.includes("Mo") == true){
                            var sss = g_array_new[i].stime.slice(5);
                            var eee = g_array_new[i].etime.slice(5);
                            var stime = new Date(g_array_new[i].stime);
                            var etime = new Date(g_array_new[i].etime);
                            var sh = stime.getHours();
                            var sm = stime.getMinutes();
                            var eh = etime.getHours();
                            var em = etime.getMinutes();
                            var top = (sh-8)*100 -1;
                            var top = top + "px";
                            var height = (eh-sh)*100 + (em-sm)*50/30 -1;
                            var height = height + "px";
                            console.log(top);                            console.log(height);
                            
                            document.getElementById("mo").innerHTML =oldHTML_mo + "<li class='single-event' data-start='"+stime+"'data-end='"+etime+"'data-content='' data-event='event-1' style ='top:"+top+"; height:" +height+ "; font-size = 3px; '><a href='#0'><span class = 'event-date'>" +sss+ " - "+eee+"</span><em class='event-name' style='font-size=5px;'>"+ g_array_new[i].name + "</em></a></li>"
                        }
                        if(g_array_new[i].date.includes("Tu")== true){
                            var stime = new Date(g_array_new[i].stime);
                            var etime = new Date(g_array_new[i].etime);
                            var sss = g_array_new[i].stime.slice(5);
                            var eee = g_array_new[i].etime.slice(5);
                            var sh = stime.getHours();
                            var sm = stime.getMinutes();
                            var eh = etime.getHours();
                            var em = etime.getMinutes();
                            var top = (sh-8)*100 -1;
                            var top = top + "px";
                            var height = (eh-sh)*100 + (em-sm)*50/30 -1;
                            var height = height + "px";
                            console.log(top);                            console.log(height);
                            document.getElementById("tu").innerHTML =oldHTML_tu+"<li class='single-event' data-start='"+stime+"'data-end='"+etime+"'data-content='' data-event='event-2' style ='top:"+top+"; height:" +height+ ";font-size = 3px;'><a href='#0'><span class = 'event-date'>" +sss+ " - "+eee+"</span><em class='event-name' style='font-size=5px;' >"+ g_array_new[i].name + "</em></a></li>"
                        }
                        if(g_array_new[i].date.includes("We")== true){
                           var stime = new Date(g_array_new[i].stime);
                            var etime = new Date(g_array_new[i].etime);
                            var sss = g_array_new[i].stime.slice(5);
                            var eee = g_array_new[i].etime.slice(5);
                            var sh = stime.getHours();
                            var sm = stime.getMinutes();
                            var eh = etime.getHours();
                            var em = etime.getMinutes();
                            var top = (sh-8)*100 -1;
                            var top = top + "px";
                            var height = (eh-sh)*100 + (em-sm)*50/30 -1;
                            var height = height + "px";
                            console.log(top);                            console.log(height);
                            document.getElementById("we").innerHTML =oldHTML_we+"<li class='single-event' data-start='"+stime+"'data-end='"+etime+"'data-content='' data-event='event-3' style ='top:"+top+"; height:" +height+ "; font-size = 3px;'><a href='#0'><span class = 'event-date'>" +sss+ " - "+eee+"</span><em class='event-name' style='font-size=5px;'>"+ g_array_new[i].name + "</em></a></li>"
                        }
                        if(g_array_new[i].date.includes("Th")== true){
                           var stime = new Date(g_array_new[i].stime);
                            var etime = new Date(g_array_new[i].etime);
                            var sss = g_array_new[i].stime.slice(5);
                            var eee = g_array_new[i].etime.slice(5);
                            var sh = stime.getHours();
                            var sm = stime.getMinutes();
                            var eh = etime.getHours();
                            var em = etime.getMinutes();
                            var top = (sh-8)*100 -1;
                            var top = top + "px";
                            var height = (eh-sh)*100 + (em-sm)*50/30 -1;
                            var height = height + "px";
                            console.log(top);                            console.log(height);
                            document.getElementById("th").innerHTML =oldHTML_th+"<li class='single-event' data-start='"+stime+"'data-end='"+etime+"'data-content='' data-event='event-4' style ='top:"+top+"; height:" +height+ "; font-size = 3px;'><a href='#0'><span class = 'event-date'>" +sss+ " - "+eee+"</span><em class='event-name' style='font-size=5px;'>"+ g_array_new[i].name + "</em></a></li>"
                        }
                        if(g_array_new[i].date.includes("Fr")== true){
                           var stime = new Date(g_array_new[i].stime);
                            var etime = new Date(g_array_new[i].etime);
                            var sss = g_array_new[i].stime.slice(5);
                            var eee = g_array_new[i].etime.slice(5);
                            var sh = stime.getHours();
                            var sm = stime.getMinutes();
                            var eh = etime.getHours();
                            var em = etime.getMinutes();
                            var top = (sh-8)*100 -1;
                            var top = top + "px";
                            var height = (eh-sh)*100 + (em-sm)*50/30 -1;
                            var height = height + "px";
                            console.log(top);                            console.log(height);
                            document.getElementById("fr").innerHTML =oldHTML_fr+"<li class='single-event' data-start='"+stime+"'data-end='"+etime+"'data-content='' data-event='event-1' style ='top:"+top+"; height:" +height+ "; font-size = 3px;'><a href='#0'><span class = 'event-date' style='font-size=5px;'>" +sss+ " - "+eee+"</span><em class='event-name'>"+ g_array_new[i].name + "</em></a></li>"
                        }
                    
                    
                }
            
                
            }
            var array_style = ["card bg-light mb-3","card text-white bg-info mb-3","card text-white bg-warning mb-3", "card text-white bg-success mb-3"];
            for(var i = 0;i < array_recommend.length;i++){
                var oldHTML = document.getElementById("card_info2").innerHTML;
                document.getElementById("card_info2").innerHTML = oldHTML + "<div class='"+array_style[3]+"' style='width: 55rem; height: 13rem ; text-align:center;display:inline-block;'><div class='card-body'><h5 class='card-title'>"+"Course Name:<label></label>"+array_recommend[i].name+"</h5><h6 class='card-subtitle mb-2 text-muted'>"+"<label></label>ID:<label></label>"+array_recommend[i].id+"</h6><p class='card-text'>"+"<label></label>Time:<label></label>"+array_recommend[i].date+"</p>" + "</h6><p class='card-text'>" +"<label></label>Instructor:<label></label>"+ array_recommend[i].instructor +"</p>" + "</h6><p class='card-text'>"+"<label></label>Average Gpa:<label></label>"+ array_recommend[i].gpa + "<br>Advance Score:"+ array_recommend[i].agscore +"</p>" +  "<hr>" + "</div></div>" + "";
            }
            
        }
        