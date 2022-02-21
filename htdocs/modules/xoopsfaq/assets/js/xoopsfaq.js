function setUrlfromtitle(datalistName, txtLibName, txtUrlName){
  alert ("setUrlfromtitle ->" + datalistName + " - " + txtLibName + " - " + txtUrlName);
  var obDatalist =  document.getElementById(datalistName);
  var obLib =  document.getElementById(txtLibName);
  var obUrl =  document.getElementById(txtUrlName);

  var lib = obLib.value;
  alert ("setUrlfromtitle ->" + txtLibName + " = " + lib);

  for (var h=0; h < obDatalist.options.length; h++){
/*
*/
    opt = obDatalist.options[h];
    if(opt.value == lib){
        href = opt.getAttribute('info');
        obUrl.value = href;
    }
  }
//  var opt = obDatalist.options[2];
//   alert ("setUrlfromtitle ->" + opt.value);
//   alert ("setUrlfromtitle ->" + opt.getAttribute('href'));
//        obUrl.value = opt.getAttribute('href');
}
