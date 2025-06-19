# 🚀 LAMP Stack CRUD Application

<div align="center">
  
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Apache](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=apache&logoColor=white)
![Ansible](https://img.shields.io/badge/Ansible-EE0000?style=for-the-badge&logo=ansible&logoColor=white)
![AWS](https://img.shields.io/badge/AWS-232F3E?style=for-the-badge&logo=amazon-aws&logoColor=white)

**A modern, responsive CRUD application with automated deployment**

[Features](#✨-features) • [Architecture](#🏛️-architecture) • [Live Demo](#🌐-live-demo) • [Quick Start](#🚀-quick-start)

</div>

## ✨ Features

- **Create, Read, Update, Delete** - Full user record management
- **Responsive Design** - Beautiful interface that works on all devices
- **Environment Configuration** - Secure credential management
- **Ansible Automation** - One-command deployment to your servers
- **High Availability** - AWS infrastructure with auto-scaling capabilities

## 🏛️ Architecture

This application is deployed on AWS with a high-availability architecture:

- **Auto Scaling Group (ASG)** - Automatically adjusts capacity to maintain performance
- **Elastic Load Balancer (ELB)** - Distributes incoming traffic across multiple instances
- **Target Groups** - Routes requests to registered targets (EC2 instances)
- **RDS Database** - Managed MySQL database service for high availability
- **Multiple Availability Zones** - Ensures reliability and fault tolerance

## 🌐 Live Demo

Access the live application:
- EC2 Instance: [http://54.195.16.174/](http://54.195.16.174)
- Load Balancer: [Lampstack-89535853.eu-west-1.elb.amazonaws.com](http://Lampstack-89535853.eu-west-1.elb.amazonaws.com)

## 📚 AWS Resources Documentation

- **Load Balancer**: [ELB Documentation](https://docs.aws.amazon.com/elasticloadbalancing/latest/application/introduction.html)
- **Auto Scaling Groups**: [ASG Documentation](https://docs.aws.amazon.com/autoscaling/ec2/userguide/auto-scaling-groups.html)
- **Target Groups**: [Target Groups Documentation](https://docs.aws.amazon.com/elasticloadbalancing/latest/application/load-balancer-target-groups.html)
- **RDS Database**: [RDS Documentation](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Welcome.html)

## 🚀 Quick Start

```bash
# Clone the repository
git clone https://github.com/yourusername/lampstack.git

# Navigate to project directory
cd lampstack

# Set up your environment file
cp .env.example .env
# Edit .env with your database credentials

# Access via your web server
# http://localhost/lampstack
```

## ⚙️ Ansible Deployment

Deploy your application to production with a single command:

```bash
cd ansible
./deploy.sh
```

## 🏗️ Project Structure

```
LampStack/
├── 📁 includes/          # Core functionality
├── 📁 ansible/           # Deployment automation
├── 📄 .env               # Environment configuration
├── 📄 index.php          # Main application
└── 📄 README.md          # Documentation
```

## 📊 Database Schema

| Field | Type | Description |
|-------|------|-------------|
| id | INT | Primary Key, Auto Increment |
| name | VARCHAR(100) | User's full name |
| email | VARCHAR(100) | User's email address |
| phone | VARCHAR(15) | Contact number |
| created_at | TIMESTAMP | Record creation time |

## 🔒 Security Features

- Environment-based configuration
- Input sanitization
- Prepared statements
- Error handling

## 🛠️ Requirements

- PHP 7.0+
- MySQL 5.7+ / MariaDB
- Apache web server
- Ansible 2.9+ (for automated deployment)

## 📝 License

This project is open-source under the MIT License.

---

<div align="center">
  <p>Author: Gideon Adjei</p>
  <p>
    <a href="https://github.com/OnTrak">GitHub</a> •
    <a href="http://3.250.233.89/">Website</a> •
    <a href="http://Lampstack-89535853.eu-west-1.elb.amazonaws.com">Load Balancer Link</a>
  </p>
</div>
