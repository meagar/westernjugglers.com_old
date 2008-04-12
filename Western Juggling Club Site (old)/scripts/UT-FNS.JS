function jsDate(){
  /* TRIALOG Associates Limited 2002 - W. E. Madryga */
  /* generate standard date */
  var month=new Array(13);
  month[1]="January";
  month[2]="February";
  month[3]="March";
  month[4]="April";
  month[5]="May";
  month[6]="June";
  month[7]="July";
  month[8]="August";
  month[9]="September";
  month[10]="October";
  month[11]="November";
  month[12]="December";

  var time=new Date();

  var textmonth=month[time.getMonth() + 1];
  var date=time.getDate();
  var year=time.getYear();
  if (year <1900) year = year + 1900;

  document.write( textmonth + " ");
  document.write(date + ", " + year );

  }

function jsTime(){
  /* TRIALOG Associates Limited 2002 - W. E. Madryga */
  /* generate zero padded clock time */
  var time=new Date();
  var hh = ("0" + time.getHours());
  var mm = ("0" + time.getMinutes());
  var ss = ("0" + time.getSeconds())

  /* negative arg1 does not work with MS Java substr method */
  hh = hh.substr(hh.length-2,2);
  mm = mm.substr(mm.length-2,2);
  ss = ss.substr(ss.length-2,2);

  document.write( hh + ":" + mm + ":" + ss );
  }

function jsExplain(obj,oname){
  /* TRIALOG Associates Limited 2002 - W. E. Madryga */
  /* list all properties of an object along with type */
  var otype;
  var prop;

  for (prop in obj){
    otype = typeof( obj[prop] );
    if (obj[prop]) document.write( oname + "." + prop + " = " + obj[prop] + "," + otype + "<br />" );
    }
  }

