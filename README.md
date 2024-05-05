# Web Messaging App

## Overview
This web messaging app is a simple platform designed for users to engage in text-based communication. It requires only a username to start chatting, making it easy for users to join conversations without any unnecessary hassle.

## I just trolled with making this web app
need for your feedback to fix problems in this app

## Features
- **User Authentication**: Users can create an account or simply enter a username to start chatting.
- **Real-Time Messaging**: Messages are sent and received in real-time, enabling seamless communication.
- **Minimalistic Interface**: The interface is designed to be intuitive and clutter-free, focusing solely on the messaging experience.
- **Database Integration**: Utilizes a SQL database to store user information and message history.

## SQL Database Setup
To set up the app, you'll need to create a SQL database with the following tables:

### Users && Chat Table
```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
)
------------------------------
CREATE TABLE `chat` (
  `messgId` int(11) NOT NULL,
  `message` text NOT NULL,
  `senderid` int(11) NOT NULL,
  `date` datetime NOT NULL
)
```
