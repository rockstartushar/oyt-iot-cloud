 	var qalist = [{
    		q:"Que 13.) What is spiritual pleasure? ",
    		o1: "abc",
    		o2: "abd",
    		o3: "abd",
    		o4: "abd",
    	},
    	{
    		q:"Que 14.) What is most important for good chanting? ",
    		o1: "bbd",
    		o2: "bbd",
    		o3: "bbd",
    		o4: "bbd",},
    	{
    		q:"Que 15.) What is austerity? ",
			o1: "cbd",
    		o2: "cbd",
    		o3: "cbd",
    		o4: "cbd",},
    	]

    	const showQues=()=>{
    		let query=""
    		qalist.forEach(
    			({
    			q,o1,o2,o3,o4
    		}, index) =>
    		(query+=`<div id=${"q-"+index}>
                <div style="background: darkblue; border: 3px solid white; border-radius: 20px;">
                    <a class="a-fifty" onclick="showFifty(${index})"><img src="fifty.png" class="img-fifty" width="10%" height="10%"></a>
                    <a class="a-audience" onclick="showPoll(${index})"><img src="audience.png" class="img-audience" width="10%" height="7%"></a>
                </div>
                <div id="poll-container">
                </div>
                <p id="timer-cover"><a style="color: white;" id="timer">0</a></p>
                <form id="q-form">
            <label class="que-d" for="question">${q} </label>
            <br />
            <hr />
            <div>
                <button onclick="rtShowResult()" type="button" class="btn btn-primary right">${o1}</button>
                <button onclick="wgShowResult()" type="button" class="btn btn-primary wrong">${o2}</button>
                <button onclick="wgShowResult()" type="button" class="btn btn-primary wrong">${o3}</button>
                <button onclick="wgShowResult()" type="button" class="btn btn-primary wrong">${o4}</button>
            </div>`)
            )
            document.getElementsByClassName("form")[0].innerHTML=query;
            console.log(query);
    	}
    	showQues();
        console.log(document.getElementsByClassName("right")[0].classList);
