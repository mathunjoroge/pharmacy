#!/bin/bash

# Retrieve the network adapter name using PowerShell
adapter_name=$(powershell -Command "(Get-NetAdapter).Name")

# Define variables for the static IP configuration
ip_address="192.168.1.19"
subnet_mask="255.255.255.0"
gateway="192.168.1.254"
dns_server="8.8.8.8"

# Run PowerShell commands to set the static IP configuration
powershell -Command "New-NetIPAddress -InterfaceAlias $adapter_name -IPAddress $ip_address -PrefixLength 24 -DefaultGateway $gateway"
powershell -Command "Set-DnsClientServerAddress -InterfaceAlias $adapter_name -ServerAddresses $dns_server"
powershell -Command "Set-NetIPInterface -InterfaceAlias $adapter_name -InterfaceMetric 10"
