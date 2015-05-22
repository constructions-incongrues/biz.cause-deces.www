biz.cause-deces.www
===================

Les souvenirs passent, les objets restent

Installation
============

```bash
sudo apt-get install virtualbox resolvconf dnsmasq
sudo sh -c 'echo "server=/vagrant.dev/127.0.0.1#10053" > /etc/dnsmasq.d/vagrant-landrush'
sudo service dnsmasq restart

wget https://dl.bintray.com/mitchellh/vagrant/vagrant_1.7.1_x86_64.deb
sudo dpkg -i vagrant_1.7.1_x86_64.deb

git clone https://github.com/constructions-incongrues/biz.cause-deces.www.git
cd biz.cause-deces.www
vagrant plugin install vagrant-vbguest
vagrant plugin install vagrant-share
vagrant plugin install landrush
vagrant up
```

Déploiement
===========
```bash
ant deploy -Dprofile=jeroboam-deces -Dassets.version=`date +%s` -Drsync.options=--delete-after
ant deploy -Dprofile=jeroboam-divorce -Dassets.version=`date +%s` -Drsync.options=--delete-after
```
