package com.personal.controller;

import com.personal.service.EmailService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.Map;

@RestController
@CrossOrigin(origins = "https://abrewabraham.dev")
@RequestMapping("/api")
public class MailRequestController
{
    @Autowired
    EmailService emailService;

    @PostMapping("sendmail")
    private void sendMail(@RequestBody Map<String,String> payload)
    {
        final String mailid = payload.get("mailid");
        final String subject = payload.get("subject");
        final String body = payload.get("body");

        emailService.sendSimpleMessage(mailid,subject,body);
        System.out.println("Mail sent successfully");
    }
}
