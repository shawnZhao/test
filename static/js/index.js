function ImageSizeFix(ImgD){ 
	var image=new Image(); 
	image.src=ImgD.src; 
	if(image.width>0 && image.height>0){ 
		flag=true; 
		if(image.width/image.height>= 200/200){ 
			if(image.width>200){ 
				ImgD.width=200; 
				ImgD.height=(image.height*200)/image.width; 
			}else{ 
				ImgD.width=image.width; 
				ImgD.height=image.height; 
			} 
			ImgD.alt=image.width+"x"+image.height; 
		} 
		else{ 
			if(image.height>200){ 
				ImgD.height=200; 
				ImgD.width=(image.width*200)/image.height; 
			}else{ 
				ImgD.width=image.width; 
				ImgD.height=image.height; 
			} 
			ImgD.alt=image.width+"x"+image.height; 
		} 
	} 
} 