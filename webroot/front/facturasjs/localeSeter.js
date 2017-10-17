/**
 * sets locale from cookie or url get var
 *
 * @requires crfut, facturascr, translatejs
 * @author <Rolando> rgarro@gmail.com
 */

var default_lang = "es";
var lang = default_lang;
var check_cookie = true;
var url_lang = CRFut.FacturasCR.UrlVars()["lang"];
var cookie_lang = "";


if(typeof url_lang != "undefined"){
  if(url_lang == "en" || url_lang == "es"){
    document.cookie = url_lang;
    lang = url_lang;
    check_cookie = false;
  }
}
if(check_cookie){
  if(document.cookie == "es" || document.cookie == "en"){
    lang = document.cookie;
  }else{
    document.cookie = default_lang;
  }
}

translate.setLocale(lang);
