function PCMSAD(PID) {
  this.ID        = PID;
  this.PosID  = 0; 
  this.ADID		  = 0;
  this.ADType	  = "";
  this.ADName	  = "";
  this.ADContent = "";
  this.PaddingLeft = 0;
  this.PaddingTop  = 0;
  this.Width = 0;
  this.Height = 0;
  this.IsHitCount = "N";
  this.UploadFilePath = "";
  this.URL = "";
  this.SiteID = 0;
  this.ShowAD  = showADContent;
  this.Stat = statAD;
}

function statAD(id) {
	var sp = document.createElement("SCRIPT");
	sp.type = "text/javascript";
	sp.src = "http://localhost/index.php?m=poster&c=index&a=show&siteid="+this.SiteID+"&id="+id+"&spaceid="+this.PosID;
	document.body.appendChild(sp);
}

function showADContent() {
  var content = this.ADContent;
  var isIE=!!window.ActiveXObject;
  var str = "<div id='PCMSAD_"+this.PosID+"'>";
  var AD = eval('('+content+')');
  var count = 0;
  if(AD.ADImage.length){
	  count = AD.ADImage.length;
  }
  for(var i=0;i<count;i++){
	if (isIE){

		if (document.readyState=="complete"){
			this.Stat(AD.ADImage[i].imgID);
		} else {
			document.onreadystatechange=function(){
				if(document.readyState=="complete") this.Stat(AD.ADImage[i].imgID);
			}
		}
	} else {
		this.Stat(AD.ADImage[i].imgID);
	}
	  str += "<li><a href='"+this.URL+"&siteid="+this.SiteID+"&id="+AD.ADImage[i].imgID+"&url="+AD.ADImage[i].imgADLinkUrl+"' target='_blank'><img alt='"+AD.ADImage[i].imgADAlt+"' title='"+AD.ADImage[i].imgADAlt+"' src='"+this.UploadFilePath+AD.ADImage[i].ImgPath+"' ";
	  var sizeStr = "";
	  if(this.Width==0&&this.Height>0){
		  sizeStr = " height='"+this.Height+"' ";
	  }else if(this.Width>0&&this.Height==0){
		  sizeStr = " width='"+this.Width+"' ";
	  }else{
		  sizeStr = (this.Width < this.Height) ? " width='"+this.Width+"' " : " height='"+this.Height+"' ";
	  }
	  str += sizeStr;
	  str += " style='border:0px;'/></a></li>";
	}
  str += "</div>";
  document.write(str);
}
 
var cmsAD_16 = new PCMSAD('cmsAD_16'); 
cmsAD_16.PosID = 12; 
cmsAD_16.ADID = 16; 
cmsAD_16.ADType = "images"; 
cmsAD_16.ADName = "广告囧"; 
cmsAD_16.ADContent = "{'ADImage':[  {'imgID':'16','imgADLinkUrl':'','imgADAlt':'','ImgPath':'http://localhost/uploadfile/2013/0424/20130424042457503.jpg','imgADLinkTarget':'New','showAlt':'Y'} ]}"; 
cmsAD_16.URL = "http://localhost/index.php?m=poster&c=index&a=poster_click"; 
cmsAD_16.SiteID = 1; 
cmsAD_16.Width = 610; 
cmsAD_16.Height = 384; 
cmsAD_16.UploadFilePath = ""; 
cmsAD_16.ShowAD();
