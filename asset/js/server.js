// server.js
const express = require('express');
const bodyParser = require('body-parser');
const twilio = require('twilio');

const app = express();
const port = 3000;

// Twilio credentials
const accountSid = 'your_account_sid';  // replace with your Twilio account SID
const authToken = 'your_auth_token';    // replace with your Twilio auth token
const client = twilio(accountSid, authToken);

app.use(bodyParser.urlencoded({ extended: true }));

app.post('/subscribe', (req, res) => {
  const email = req.body.ne;

  // Send WhatsApp message
  client.messages
    .create({
      body: `New subscription: ${email}`,
      from: 'whatsapp:+6285963060775',  // replace with your Twilio WhatsApp number
      to: 'whatsapp:+6285963060775'      // replace with your WhatsApp number
    })
    .then(message => {
      console.log(message.sid);
      res.send('Subscription successful');
    })
    .catch(error => {
      console.error(error);
      res.status(500).send('Subscription failed');
    });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
