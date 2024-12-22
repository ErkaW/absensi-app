# Use the official Filebeat image
FROM docker.elastic.co/beats/filebeat:8.16.2

# Set the working directory
WORKDIR /usr/share/filebeat

# Copy your custom filebeat.yml configuration file into the container
COPY filebeat.yml /usr/share/filebeat/filebeat.yml

# Set the user to root to ensure correct permissions
USER root

# Set the correct permissions (owner only can write)
RUN chmod go-w /usr/share/filebeat/filebeat.yml



# Entry point to start Filebeat
CMD ["filebeat", "-e"]
