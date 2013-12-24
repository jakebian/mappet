#Database structure

##place
> a specific location, e.g. a power plug on 2nd floor of the White House

###fields
+ name
+ description
+ latitude
+ longitude
+ score (user rating)
+ created_on (date)
+ updated_on (date)

###many to one
* created_by (user)
---later + updated_by (user)
* part_of (submap)

###many-to-many
* visited_by (user)

##submap
> a category describing a class of objects, e.g., a submap of waterfountains

###fields
+ name
+ description
+ created_on (date)
+ updated_on (date)

###many to one
+ created_by (user)


##user
user table is provided by Sentry 2
