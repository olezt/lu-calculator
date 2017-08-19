function lunaTalk(delay, times){
	setIntervalX(function () {
		$("#lunaUp").toggleClass('talkUp');
		$("#lunaDown").toggleClass('talkDown');
	}, delay, times);
	
	var audio = new Audio('./sound/bark.mp3');
	setIntervalX(function () {
		audio.play();
	}, delay*2, times/2);
	
}

function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {

       callback();

       if (++x === repetitions) {
           window.clearInterval(intervalID);
       }
    }, delay);
};