# GitDashboard

## Description

The GitDashboard is a simple dashboard for displaying key information of multiple local repositories, contributors and commits. The dashboard contains general repository statistics, contributor rankings, individual repository information as well as the most recent commits.

It is built in a way that doesn't require manual interactions with it and just loops through the information infinetly. Periodically it updates it's information by itself in order to show the newest statistics.

## Intention

The intention of this dashboard is to have a simple and clean way to display repository and contributor information in public areas like wating areas for customers etc.

This is can also be used as basis for development gamification. By gamifying the development process developers can get motivated and take away the "This just is a job." feeling. Public rankings can also demotivate developers and put too much stress on them which is why it's important to only show positive rankings as well as only implement the gamification in work environments where people have a positive attitude towards it. A more robust gamification dashboard as well as more in depth repository information could be achieved with the dependencies as well but better belong to a new project since this is only intended to be a self running looping dashboard without any interactions.

# Configuration

The minimalistic and self-explanatory config file allows the user to define the local repositories to include, observation period used for collecting the information for the statistics, excluding contributors from the statistics etc.

# Setup

The setup is fairly simple and straight forward.

1. Download the phpOMS repository
2. Download the jsOMS repository
3. Download the cssOMS repository
4. Download the GitDashboard repository
5. Put all these repositories in the same parent directory
6. Adjust the config file in the GitDashboard directory
7. Open your browser with the path to the GitDashboard index.php

# Possible features

Some features for the dashboard could be to include additional tools such as:

* PhpMD
* PhpCS
* PhpCPD
* PhpMetrics
* PhpLOC

However this is outside of the scope for now and not planned to implement in the near future.

# Dependencies

## Internal

* phpOMS
* jsOMS
* cssOMS

## External

* d3js
* font-awesome

# Images

The project is still under development :)

![Statistics](https://raw.githubusercontent.com/Orange-Management/GitDashboard/master/img/documentation/stats.png)
![Rankings](https://raw.githubusercontent.com/Orange-Management/GitDashboard/master/img/documentation/rankings.png)
![Repositories](https://raw.githubusercontent.com/Orange-Management/GitDashboard/master/img/documentation/repositories.png)
![Commits](https://raw.githubusercontent.com/Orange-Management/GitDashboard/master/img/documentation/commits.png)
