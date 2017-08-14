function lunaTalk(delay, times){
	setIntervalX(function () {
		$("#lunaUp").toggleClass('talkUp');
		$("#lunaDown").toggleClass('talkDown');
	}, delay, times);
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