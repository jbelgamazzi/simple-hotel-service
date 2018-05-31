# simple-hotel-service
Simple Hotel Service

This service aims to display hotels for a certain city. This is not a query API, so some information has been add in the code and the data source is represented by a JSON file.

A Partner Service interface is implemented by reading the data set represented in the JSON file.

The created entities are encapsulated:
(Hotel) - [hasMany] -> (Partner) - [hasMany] -> (Price)

### Next steps
- Implement a way to get different implementations
- Add Docker