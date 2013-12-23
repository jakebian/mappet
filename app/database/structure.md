#Database structure

##place
> a specific location, e.g. a power plug on 2nd floor of the White House

###fields
+ name
+ description
+ latitude
+ longitude
+ score (user rating)

###has many
+ part_of (submap)
+ visited_by (user)
+ updated_by (user)

###has one
+ created_by (user)
+ created_on (date)
+ updated_on (date)

##submap
> a category describing a class of objects, e.g., a submap of waterfountains

###fields
+ name
+ description

###has many
+ instance (place)

###has one
+ created_by (user)
+ created_on (date)
+ updated_on (date)

##user
user table is provided by Sentry 2
