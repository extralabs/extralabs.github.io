var encode_array=[];
var encode_array2=[];

function ord(string) 
{
    	return (string+'').charCodeAt(0);
}

function chr(ascii) 
{
	return String.fromCharCode(ascii);
}

function encode_create_array()
{
	var char=0;
	var c1=ord('g');
	var c2=ord('p');
	
	while (char<=255)
	{
		encode_array[char]=''+chr(c1)+chr(c2);
		encode_array2[''+chr(c1)+chr(c2)]=char++;
		c2++;
		if (c2>ord('z'))
		{
			c2=ord('a');
			c1++;
			if (c1>ord('z'))
			{
				c1=ord('a');
			}
		}
	}
}

function encode(text)
{
	if (encode_array.length==0)
	{
		encode_create_array();
	}

	var len=text.length;
	var i=0;
	var ret='';

	while (i<len)
	{
		char=ord(text.substr(i++,1));
		if (char>=0 && char<=255) { ret=ret+encode_array[char];	} else { return(''); }
	}
	return(ret);
}