<html>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    
    
    <label>Device ID: </label>
    <input id="deviceIDInput" type="text"><br>
    <label>Temperature: </label>
    <input id="tempInput" type="text"><br>
    <label>Humidity: </label>
    <input id="humidityInput" type="text"><br>
    <label>Pressure: </label>
    <input id="pressureInput" type="text"><br>
    <label>Altitude: </label>
    <input id="altInput" type="text"><br>
    
    <button type="button" id="pushData">Push data</button><br><br><br>
    <div id="ret" style="border: 3px solid gray;display: block;height: 200px;width: 500px;">
    
    
    </div>

    
    
    <script>
        window.onerror = function(msg, url, linenumber) {
            alert('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
            console.log('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
            return true;
        }

        function POST(url, data, dataType, cb) {

            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                dataType: dataType,
                success: function(ret) {
                    cb(null, ret);
                },
                error: function(xhr, status, err) {
                    cb((err), false);
                }
            });
        }
        
        $('#pushData').click(function(){
            var id = $('#deviceIDInput').val();
            var temp = $('#tempInput').val();
            var humidity = $('#humidityInput').val();
            var pressure = $('#pressureInput').val();
            var alt = $('#altInput').val();
           POST('http://46.182.227.40/sql_pushData.php', {deviceId:id, temp:temp, humidity:humidity, pressure:pressure,altitude:alt},'text', function(err,data){
               if(err){
					alert('Server Error!'+ err);
				}
               
               if(data){
                   $('#ret').append(data);
               }
           }); 
        });
        
        /*POST('get.php', {path: curDir}, 'text', function(err, data){
				clearTimeout(Login);
				if(err){
					error('Server Error!', err);
				}
				updatePath();
				$('#list').html(data).fadeIn(100);
				$('#spinner').hide();
				lastSort();
				toggleRow();
				checkUrlQuery();
				if(!historyList.includes(curDir)){
					historyList.push(curDir);
					updateHistory();
				}
			});*/
    </script>
</body>
</html>
