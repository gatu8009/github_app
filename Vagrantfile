# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "ubuntu/trusty64"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  config.vm.network "forwarded_port", guest: 80, host: 7777

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  config.vm.network "public_network"

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  config.ssh.forward_agent = true

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder "./github_app", "/var/www/github_app", id:"vagrant-root", :owner => "www-data", :group => "www-data", :mount_options => ["dmode=777","fmode=666"]

  config.vm.provider "virtualbox" do |v|
    
    v.memory = 1024
    
    v.cpus = 2
 
  end

  # Install required software, dependencies and configurations on the
  # virtual machine using a provisioner.
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "provision/install.yml"
    # ansible.verbose = "vvv"
  end
end
