# SuperGeekery DayPhrase

## Overview

SuperGeekery DayPhrase is a ExpressionEngine plug-in.

It is a single ExpressionEngine tag that takes the name of a day of the week, lower-case, as a parameter and a string. For example, here's a version of the tag showing all 8 possible parameters, including 'default'. 

	{exp:sg_dayphrase
		sunday="I'm feeling sunny."
		monday= "I'm going cyan."
		tuesday="I'm ready to go."
		wednesday="I'm talking turquoise."
		thursday="I'm feeling spooky."
		friday="I'm feeling funky."
		saturday="I'm going green."
		default = "I'm just showing a default message."
	}

The 'default' value would never be seen in the case above because all 7 days of the week are defined. The 'default' value is only useful if you don't define some of the days of the week. See this example:

	{exp:sg_dayphrase
		friday="I love Fridays!"
		saturday=""
		sunday="The weekend is almost over. Bummer."
		default = "I'm holding out for Friday."
	}

In this case, Monday - Thursday the tag would output "I'm holding out for Friday." On Saturday, it would output nothing because the 'saturday' parameter is defined but set to nothing. That means it won't inherit the default value because it is defined as an empty string. On Sunday the tag will output the message, "The weekend is almost over. Bummer."

## Installation

To install this plug-in, place the "sg_dayphrase" folder in your system/expressionengine/third_party folder on your server.