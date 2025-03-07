#!/bin/bash

# Detect the operating system
if [[ "$OSTYPE" == "darwin"* ]]; then
    # macOS
	link1="mvc.test:8080"
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    # Linux
	link1="mvc.test:8080"
else
    echo "Unsupported operating system"
    exit 1
fi

link2="https://www.youtube.com/watch?v=xbTLNsg3lY0&list=PLZ2ovOgdI-kUSqWuyoGJMZL6xldXw6hIg&index=75"

export link1
export link2
