CKEDITOR.dialog.add('custimageDialog',function(editor){return{title:'Image Properties',minWidth:400,minHeight:200,contents:[{id:'tab-basic',label:'Basic Settings',elements:[{type:'text',id:'src',label:'Source',validate:CKEDITOR.dialog.validate.notEmpty("Image source field cannot be empty")},{type:'text',id:'alt',label:'Alternative'}]}],onShow:function(){CKEDITOR.dialog.getCurrent().hide();
var my=window.open("ckeditor/plugins/custimage/dialogs/dialogtest.html","ImageBrowser","menubar=1,resizable=1,width=950,height=580");//change this code to your desired page
my.focus()},onOk:function(){var dialog=this;var custimage=editor.document.createElement('img');custimage.setAttribute('src',dialog.getValueOf('tab-basic','src'));custimage.setAttribute('alt',dialog.getValueOf('tab-basic','alt'));editor.insertElement(custimage)}}});