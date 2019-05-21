# cinema-manager
Cinema management system

Libraries used:

AdminLTE: provides a nice set up for ABMs.

I've also used a couple of helpers provided from forums and such.


Endpoints provided:

/api/movies
params (optional):
	-id : filters the movies by its id
	-title : filters the movies that contains the value of the param in the title

/api/people
params (optional):
	-id : filters the people by its id
	-first_name: filters the people that contains the value of the param in its first name
	-last_name: filters the people that contains the value of the param in its last name
