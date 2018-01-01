# Event-Sourcing-with-CQRS-in-Laravel


# What is Event Sourcing

Event sourcing is nothing but a term or architectural pattern. If something or anything happen 
(called event) and stored in one place and at a certen time if we could fetch those event form that 
particular place is called Event Sourcing.

![es](https://user-images.githubusercontent.com/27927662/34467456-981665a6-ef1c-11e7-9b15-dc949c93ce13.png)


# What is CQRS

CQRS is the sort form of Command Query Responsibility Segregation.
What does it mean? Here Command and Query both are task. Command means occurring any changes and Query 
is to fetch data according application demand. Simply Command and Query is read and write. Bertrand Meyer 
introduce CQRS to us. CQRS pattern helps software architect to design the application architecture 
where reading and writing are separate.
It makes the application more secure and maximize the performance.

![cqrs](https://user-images.githubusercontent.com/27927662/34467460-ba37faaa-ef1c-11e7-86c3-4b6638b6e827.png)


# Why programmer use or do not use Event Sourcing

Event Sourcing isn't something you could use in every application. The most toughest thing of event 
sourcing is to understant where to use it. It makes the application traceable and secure. If any how 
you loss any data you could retrive from event or something happen unexpected, easily it can be tracked 
and solved. 
As data reading gets the priority when events are transferd to the query database, it becomes easy and 
load less to read the data which makes the application faster and efficient.
Event Sourcing is good for big and complex project where you may need historic event. Using ES in small 
or simple CRUD application will just make it complex without giving significant benifits.



# Why programmer use CQRS

It is one of the most intesting design pattern if used properly. It makes read and write indipendent 
which balance server load and keep code clean. When ES requires complex query, CQRS makes it simple. 
Programmer implement CQRS also to handle too much database request.



# About the project

I tried to keep the projetc as simple as possible to make it understandable to the beggineers.

It's a demo banking system with two user types one is Account Holder and the other one is Manager.

> Account Holder Activity...  
	Account Holder will be able to deposite money.
	and
	Will be able to transfer to the another Account Holder's Account.

> Manager's Activity...
	Manager can erase the Account Holder's deposited amount.
	and
	Stop the Account Holder's transaction

Registration is required for both User. 


# How i use Event Sourcing and CQRS

	Use of database____
		There are three table in database. users, deposits and event_store.

		> users for Account Holder and Manager both are differentiated by type column.
		> deposits is for the amount the have.
		  And
		> event_stores is used to store the event.
	
	Account Holder's activity____

		** Data Reading(Query)___
		
			* Show Amount
				Request goes to show method of Account Controller. Instantiate QueryService initializing
				 Account Holder's email id. And then get the balance.



		** Data Writing(Command)___
		
			* Deposit

				Account Holder's request will be redirected to the Account Controller.
				To deposit amount there is a deposit method where AccountCommandHandler is called to 
				handle the Command(command is event identifier).
				And pass a parameter of AccountDepositCommand where deposit command, account holder's 
				email and amount is initialized.

				In AccountCommandHandler Class, event is created in JSON format calling 
				CreateDepositeEvent.

				There are two more class is Instantiated one is EventStore and other one is EventHandler.
				EventStore is to store the event in event_stores table with command.
				And EventHandler is to handle the event, where deposit data goes to deposit table.

			* Transfer

				Amount transferring is as same as the deposit,
				Transferring Request goes to transfer method of Account Controller, here Request 
				data(Sender, Receiver and amount) is inintialized in AccountTransferCommand and the 
				AccountTransferCommand object is passed to AccountTransferCommandHandler.
				
				In AccountTransferCommandHandler, 
					CreateTransferEvent create transfer event.
					EventStore store the created event.
					And then goes to EventHandler.
				In EventHandler transfer successfully executed if the amount is less or equal than 
				the sender total amount otherwise the transffer failed.




	Manager activity____

		** Data Reading(Query)___

			* Show Account Deposit
				When the request executed it comes accountsList of Manager Controller, where 
				getAccountsList method of AdminQueryService is called.
			
			* History
				Every event is showed here. History request first comes to history method of Manager 
				Class.
				Then goes to getHistory of AdminQueryService.
		

		** Data Writing(Command)___

			* Stop Transection

				The Request comes from history page. First goes stopTransection method of Manager 
				class and create a object of AccountStopCommand initializing sender, receiver and 
				amount value and pass this object to AccountStopCommandHandler to create, store and 
				handle the event. In EventHandler sender gets the transfer amount and receiver lost
				the amount.
			
			* Deposit Delete
				To delete deposite delete method of Manager create AccountDeleteCommand object and send
				it to AccountDeleteCommandHandler. And first event created then event Store and at last 
				event is handled deleting specific row of deposit table.
		

![es with cqrs](https://user-images.githubusercontent.com/27927662/34467464-d2ff2d2e-ef1c-11e7-99ed-5a654ffe4229.png)



# Why i use Event Sourcing and CQRS
	
	* To track the deposit and transfer of Account Holder.
	* To minimize the complex query like join.
	* To keep code clean.
	* To make it easy to add new feature.
