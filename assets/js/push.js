var push = require('web-push');

let vapidkeys = {
  publicKey: 'BFKc-Vv7zdeg1qSALj7Blw87zFZgmQHPYRRIrQQLYoo7KGoP1X_TEbALHxrug0xAUYUKhrAEF-uTvU7Wt1OGZSo',
  privateKey: 'MhrHCsfzKfYkoFRlAcUQ4bz0-7nWluyiCwWcMNLN2YQ'
}

push.setVapidDetails('mailto:test@test.com',vapidkeys.publicKey,vapidkeys.privateKey);

push.sendNotification(sub,'test message')

// code to generate VAPID Keys
// let vapid = push.generateVAPIDKeys();

// Console logging Vapid Keys
// console.log(vapid);