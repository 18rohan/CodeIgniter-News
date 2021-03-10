<h1><?= $title ?></h1>


<script type="text/javascript">


function showNotification(){
	const notification = new Notification("New message from CPI",{
		body:"New jobs for React developer posted"
	});
}
console.log(Notification.permission);

if(Notification.permission === 'granted'){
	showNotification();
}else if(Notification.permission !== 'denied'){
	Notification.requestPermission().then(permission =>{
		if(permission === 'granted'){
			console.log(Notification.permission);
			showNotification();

		}
	})
}
</script>